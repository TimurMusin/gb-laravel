@extends('layouts.admin')
@section('title')
@parent Новости
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Изменить новость</h1>
</div>
<div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group mt-2">
            <label for="category_id">Категория</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if ($category->id === $news->category_id) selected @endif>
                    {{ $category->title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="source_id">Источник</label>
            <select name="source_id" id="source_id" class="form-control">
                @foreach ($sources as $source)
                <option value="{{ $source->id }}" @if ($source->id === $news->category_id) selected @endif>
                    {{ $source->title }}
                </option>
                @endforeach
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="title">Заголовок</label>
            <input class="form-control" type="text" name="title" id="title" value="{{ $news->title }}">
        </div>
        <div class="form-group mt-2">
            <label for="author">Автор</label>
            <input class="form-control" type="text" name="author" id="author" value="{{ $news->author }}">
        </div>
        <div class="form-group mt-2">
            <label for="image">Изображение</label>
            <input class="form-control" type="file" name="image" id="image">
        </div>
        <div class="form-group mt-2">
            <label for="status">Статус</label>
            <select class="form-control" name="status" id="status">
                <option @if ($news->status ==='DRAFT' ) selected @endif>DRAFT</option>
                <option @if ($news->status ==='ACTIVE' ) selected @endif>ACTIVE</option>
                <option @if ($news->status ==='BLOCKED' ) selected @endif>BLOCKED</option>
            </select>
        </div>
        <div class="form-group mt-2">
            <label for="description">Описание</label>
            <textarea class="form-control" name="description" id="description">{!! $news->description !!}</textarea>
        </div>
        <button class="btn btn-success mt-4" type="submit">Сохранить</button>
    </form>
</div>
@endsection