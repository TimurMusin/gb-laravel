@extends('layouts.main')
@section('header')
<div class="row py-lg-5">
    <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Форма заказа</h1>
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
    <form method="post" action="{{ route('order.store') }}">
        @csrf
        <div class="form-group mt-2">
            <label for="name">Ваше имя</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ old('name') }}">
        </div>
        <div class="form-group mt-2">
            <label for="tel">Контактный номер</label>
            <input class="form-control" type="tel" name="tel" id="tel" value="{{ old('tel') }}">
        </div>
        <div class="form-group mt-2">
            <label for="email">Контактный e-mail</label>
            <input class="form-control" type="email" name="email" id="email" value="{{ old('email') }}">
        </div>
        <div class="form-group mt-2">
            <label for="order">Заказ</label>
            <textarea class="form-control" name="order" id="order">{!! old('order') !!}</textarea>
        </div>
        <button class="btn btn-success mt-4" type="submit">Отправить</button>
    </form>
</div>
@endsection