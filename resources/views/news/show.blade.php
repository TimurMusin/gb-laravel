@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">{{$news->title}}</h1>
    </div>
</div>
@endsection
@section('content')
<img src="{{ $news->image }} alt=" News image">
<div class=" card-body">
    <p class="card-text">
        {{ $news->description }}
    </p>
    <div class="d-flex justify-content-between align-items-center">
        <small class="text-muted">
            Категория :
            <em>
                {{ $news->category->title }}
            </em>
        </small>
        <small class="text-muted">
            Стаутус:
            <em>
                {{ $news->status }}
            </em>
        </small>
    </div>
    <div class="d-flex justify-content-between align-items-center pt-2">
        <small class="text-muted">
            Источник:
            <em>
                {{ $news->source->title }}
            </em>
        </small>
        <small class="text-muted">
            Автор:
            <em>
                {{ $news->author }}
            </em>
        </small>
    </div>
</div>
@endsection