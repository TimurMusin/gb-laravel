@extends('layouts.admin')
@section('title')
@parent Источники
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать источник</h1>
</div>
<div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.sources.update', ['source' => $source]) }}">
        @csrf
        @method('put')
        <div class="form-group mt-2">
            <label for="title">Наименование</label>
            <input class="form-control @error('title') alert-danger @enderror" type="text" name="title" id="title"
                value="{{ $source->title }}">
            @error('title')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="url">Url</label>
            <textarea class="form-control @error('url') alert-danger @enderror" name="url"
                id="url">{!! $source->url !!}</textarea>
            @error('url')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <button class="btn btn-success mt-4" type="submit">Сохранить</button>
    </form>
</div>
@endsection