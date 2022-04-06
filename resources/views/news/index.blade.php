@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Список новостей</h1>
    </div>
</div>
@endsection
@section('content')
@forelse ($newsList as $news)
<div class="col">
    <div class="card shadow-sm">
        <img class="card-img-top" src="{{ $news->image }} alt=" News image">
        <div class="card-body">
            <h5 class="card-title">
                {{ $news->title }}
            </h5>
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
            <div class="btn-group d-flex pt-2">
                <a href="{{ route('news.show', ['id' => $news->id]) }}" class="btn btn-sm btn-outline-secondary">
                    Подробнее
                </a>
            </div>
        </div>
    </div>
</div>
@empty
<h2>Новостей нет</h2>
@endforelse
@endsection
@section('paggination')
{{ $newsList->links() }}
@endsection