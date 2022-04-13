@extends('layouts.admin')
@section('title')
@parent Источники
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список Новостей</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.news.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                новость</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Наименование</th>
            <th>Изображение</th>
            <th>Категория</th>
            <th>Статус</th>
            <th>Автор</th>
            <th>Источник</th>
            <th>Опции</th>
        </thead>
        <tbody>
            @forelse ($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->image }}</td>
                <td>{{ $news->categoryTitle }}</td>
                <td>{{ $news->status }}</td>
                <td>{{ $news->author }}</td>
                <td>{{ $news->sourceTitle }}</td>
                <td>
                    <a href="{{ route('admin.news.edit', ['news' => $news->id]) }}">Ред.</a>
                    &nbsp;
                    <a href="javascript:;" style="color: red;">Удл.</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection