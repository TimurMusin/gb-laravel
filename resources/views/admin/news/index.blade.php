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
@include('inc.messages')
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Заголовок</th>
            <th>Изображение</th>
            <th>Категория</th>
            <th>Статус</th>
            <th>Автор</th>
            <th>Источник</th>
            <th>Дата редактирования</th>
            <th>Опции</th>
        </thead>
        <tbody>
            @forelse ($newsList as $news)
            <tr>
                <td>{{ $news->id }}</td>
                <td>{{ $news->title }}</td>
                <td>{{ $news->image }}</td>
                <td>{{ $news->category->title }}</td>
                <td>{{ $news->status }}</td>
                <td>{{ $news->author }}</td>
                <td>{{ $news->source->title }}</td>
                <td>
                    @if ($news->updated_at)
                    {{ $news->updated_at->format('d.m.Y H:i') }}
                    @endif
                </td>
                <td style="display: flex">
                    <form action="{{ route('admin.news.edit', $news) }}" method="get" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Ред.
                        </button>
                    </form>
                    <form action="{{ route('admin.news.destroy', $news) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            Удл.
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $newsList->links() }}
</div>
@endsection