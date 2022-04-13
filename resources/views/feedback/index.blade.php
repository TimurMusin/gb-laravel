@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Обратная связь</h1>
    </div>
</div>
@endsection
@section('content')
<div class="raw">
    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <x-alert type="danger" :message="$error"></x-alert>
    @endforeach
    @endif
    <form method="post" action="{{ route('feedback.store') }}">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Ваше имя</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-2">
            <label for="message">Сообщение</label>
            <textarea class="form-control" name="message" id="message">{!! old('message') !!}</textarea>
        </div>
        <button class="btn btn-success mt-4" type="submit">Отправить</button>
    </form>
</div>
@endsection