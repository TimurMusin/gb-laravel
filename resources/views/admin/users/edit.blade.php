@extends('layouts.admin')
@section('title')
@parent Пользователи
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Редактировать пользователя</h1>
</div>
<div class="raw">
    @include('inc.messages')
    <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
        @csrf
        @method('put')

        <div class="form-group mt-2">
            <label for="name">Имя</label>
            <input class="form-control @error('name') alert-danger @enderror" type="text" name="name" id="name"
                value="{{ $user->name }}">
            @error('name')
            <strong style="color: red;">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="email">Адрес email</label>
            <input class="form-control @error('email') alert-danger @enderror" type="email" name="email" id="email"
                value="{{ $user->email }}">
            @error('email')
            <strong style="color: red;">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="password">Текущий пароль</label>
            <input class="form-control @error('password') alert-danger @enderror" type="password" name="password"
                id="password">
            @error('password')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group mt-2">
            <label for="newPassword">Новый пароль</label>
            <input class="form-control @error('newPassword') alert-danger @enderror" type="newPassword"
                name="newPassword" id="newPassword">
            @error('newPassword')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>
        <div class="form-group form-check form-switch mt-4">
            <label class="form-check-label" for="is_admin">Админ</label>
            <input class="form-check-input @error('is_admin') alert-danger @enderror" type="checkbox" name="is_admin"
                id="is_admin" @if ($user->is_admin) checked @endif>
            @error('is_admin')
            <strong style="color: red">{{ $message }}</strong>
            @enderror
        </div>

        <button class="btn btn-success mt-4" type="submit">Сохранить</button>
    </form>
</div>
@endsection