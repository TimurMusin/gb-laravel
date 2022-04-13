@extends('layouts.admin')
@section('title')
@parent Категории
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Добавить категорию</h1>
</div>
<div class="raw">
    @include('inc.messages')
    <form method="post" action="{{route('admin.categories.store')}}">
        @csrf
        <div class="form-group mt-2">
            <label for="title">Наименование</label>
            <input class="form-control @error('title') alert-danger @enderror" type="text" name="title" id="title"
                value="{{ old('title') }}">
            @error('title')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class=" form-group mt-2">
            <label for="description">Описание</label>
            <textarea class="form-control @error('description') alert-danger @enderror" name="description"
                id="description">{!! old('description') !!}</textarea>
            @error('description')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <button class="btn btn-success mt-4" type="submit">Сохранить</button>
    </form>
</div>
@endsection