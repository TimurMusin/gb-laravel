@extends('layouts.admin')
@section('title')
@parent Категории
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список категорий</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                категорию</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    @include('inc.messages')
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Наименование</th>
            <th>Описание</th>
            <th>Кол-во новостей</th>
            <th>Изменено</th>
            <th>Опции</th>
        </thead>
        <tbody>
            @forelse ($categoryList as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->title }}</td>
                <td>{{ $category->description }}</td>
                <td>{{ $category->news_count }}</td>
                <td>
                    @if ($category->updated_at)
                    {{ $category->updated_at->format('d.m.Y H:i') }}
                    @endif
                </td>
                <td style="display: flex">
                    <form action="{{ route('admin.categories.edit', $category) }}" method="get" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Ред.
                        </button>
                    </form>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="post">
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
    {{ $categoryList->links() }}
</div>
@endsection