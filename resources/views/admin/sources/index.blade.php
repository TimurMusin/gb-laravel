@extends('layouts.admin')
@section('title')
@parent Источники
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список источников</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                источник</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    @include('inc.messages')
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Наименование</th>
            <th>URL</th>
            <th>Кол-во новостей</th>
            <th>Изменено</th>
            <th>Опции</th>
        </thead>
        <tbody>
            @forelse ($sourceList as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->title }}</td>
                <td>{{ $source->url }}</td>
                <td>{{ $source->news_count }}</td>
                <td>
                    @if ($source->updated_at)
                    {{ $source->updated_at->format('d.m.Y H:i') }}
                    @endif
                </td>
                <td style="display: flex">
                    <form action="{{ route('admin.sources.edit', $source) }}" method="get" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Ред.
                        </button>
                    </form>
                    <form action="{{ route('admin.sources.destroy', $source) }}" method="post">
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
    {{ $sourceList->links() }}
</div>
@endsection