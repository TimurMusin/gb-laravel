@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Список категорий</h1>
    </div>
</div>
@endsection
@section('content')
@forelse ($categoryList as $category)
<div class="col">
    <div class="card shadow-sm">
        <h3>
            <a href="{{ route('categories.show', ['name' => $category]) }}">
                {{ $category }}
            </a>
        </h3>
    </div>
</div>
@empty
<h2>Категорий нет</h2>
@endforelse
@endsection