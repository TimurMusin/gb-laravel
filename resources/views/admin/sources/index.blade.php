@extends('layouts.admin')
@section('title')
@parent Источники
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список Источников</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                источник</a>
        </div>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Наименование</th>
            <th>URL</th>
            <th>Опции</th>
        </thead>
        <tbody>
            @forelse ($sourceList as $source)
            <tr>
                <td>{{ $source->id }}</td>
                <td>{{ $source->title }}</td>
                <td>{{ $source->url }}</td>
                <td>
                    <a href="{{ route('admin.sources.edit', ['source' => $source->id]) }}">Ред.</a>
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