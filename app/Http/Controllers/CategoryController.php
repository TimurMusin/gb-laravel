<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = app(Category::class);
        return view('categories.index', ['categoryList' => $categories->getCategories()]);
    }

    public function show(int $id)
    {
        $news = app(News::class);
        return view('categories.show', ['newsList' => $news->getNewsByCategory($id)]);
    }
}
