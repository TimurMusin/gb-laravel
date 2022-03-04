<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

$news = array('Первая новость', 'Вторая новость');

function news ($arr) {
    $result = '';
    foreach ($arr as $val) {
        $result = $result . "{$val}<br/>";
    }
    return $result;
}

Route::get('/hello/{user}', fn(string $user) => "Hello, {$user}");
Route::get('/info', fn() => "Курс Laravel. Глубокое погружение. Урок 1.");
Route::get('/news', fn() => news($news));
