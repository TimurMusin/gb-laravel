<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\Source;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\News\EditRequest;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        News::all()->last()->delete();
        return view('admin.news.index', [
            'newsList' => News::with('category')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create', [
            'categories' => Category::select("id", "title")->get(),
            'sources' => Source::select("id", "title")->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        $news = News::create($request->validated());
        if ($news) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.create.success'));
        }
        return back()->with('error', __('messages.admin.news.create.fail'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('admin.news.edit', [
            'news' => $news,
            'categories' => Category::select("id", "title")->get(),
            'sources' => Source::select("id", "title")->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, News $news)
    {

        $status = $news
            ->fill($request->validated())
            ->save();
        if ($status) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', __('messages.admin.news.update.success'));
        }
        return back()->with('error', __('messages.admin.news.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = News::find($id)->delete();
        if ($status) {
            return redirect()
                ->route('admin.news.index')
                ->with('success', 'Новость успешно удалена');
        }
        return back()->with('error', 'Не удалось удалить новость');
    }
}
