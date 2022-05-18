@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Добро пожаловать, {{ Auth::user()->name }}!</h2>
    <br>
    @if (Auth::user()->is_admin)
    <a href="{{ route('admin.index') }}">Панель администратора</a>
    @endif
</div>
@endsection