<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 2. Добавить в проект несколько контроллеров для вывода следующих страниц:
// 1.2. Страница категорий новостей. Данная страница должна выводить все категории из
// данных созданных в первом задании.

class CategoryController extends Controller
{
    public function index()
    {
        $category = $this->getCategory();

        return view('category.index', [
            'categoryList' => $category
        ]);
    }

    public function show(string $category)
    {
        // filter array of news by category
        $news = $this->getNewsByCategory($category);

        return view('category.show', [
            'category' => $category,
            'newsList' => $news
        ]);
    }
    // public function index()
    // {
    //     $news = $this->getNews();

    //     return view('news.index', [
    //         'newsList' => $news
    //     ]);
    // }
}
