@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Новости по категории: {{ $category }}</h1>
    </div>
</div>
@endsection
@section('content')
@forelse ($newsList as $news)
<div class="col">
    <div class="card shadow-sm">
        <img src="{{ $news['image'] }}">
        <h3>
            <a href="{{ route('news.show', ['id' => $news['id']]) }}">
                {{ $news['title'] }}
            </a>
        </h3>
        <div class="card-body">
            <p class="card-text">
                {{ $news['description'] }}
            </p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('news.show', ['id' => $news['id']]) }}" class="btn btn-sm btn-outline-secondary">
                        Подробнее
                    </a>
                </div>
                <small class="text-muted">
                    Автор:
                    <em>
                        {{ $news['author'] }}
                    </em>
                </small>
                <small class="text-muted">
                    Категория:
                    <em>
                        {{ $news['category'] }}
                    </em>
                </small>
                <small class="text-muted">
                    Стаутус:
                    <em>
                        {{ $news['status'] }}
                    </em>
                </small>
            </div>
        </div>
    </div>
</div>
@empty
<h2>Новостей нет</h2>
@endforelse
@endsection