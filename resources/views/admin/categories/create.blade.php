@extends('layouts.admin')
@section('title')
@parent Категории
@endsection
@section('content')
<div>
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Добавить категорию</h1>
        <div class="btn-toolbar mb-2 mb-md-0">

        </div>
    </div>
    <div class="raw">
        @include('inc.messages')
        <form method="post" action="{{route('admin.categories.store')}}">
            @csrf
            <div class="form-group mt-2">
                <label for="title">Наименование</label>
                <input class="form-control" type="text" name="title" id="title">
            </div>
            <div class="form-group mt-2">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description"></textarea>
            </div>
            <button class="btn btn-success mt-4" type="submit">Сохранить</button>
        </form>
    </div>
</div>
@endsection