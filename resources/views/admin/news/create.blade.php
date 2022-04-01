@extends('layouts.admin')
@section('title')
@parent Новости
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить новость</h1>
</div>
<div class="raw">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
    @endif
    <form method="post" action="{{ route('admin.news.store') }}">
        @csrf
        <div class="form-group mt-2">
            <label for="title">Наименование</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group mt-2">
            <label for="author">Автор</label>
            <input class="form-control" type="text" name="author" id="author" value="{{ old('author') }}">
        </div>
        <div class="form-group mt-2">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if (old('status')==='DRAFT' ) selected @endif>DRAFT</option>
                <option @if (old('status')==='ACTIVE' ) selected @endif>ACTIVE</option>
                <option @if (old('status')==='BLOCKED' ) selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
        </div>
        <button class="btn btn-success mt-4" type="submit">Сохранить</button>
    </form>
</div>
@endsection