@extends('layouts.admin')
@section('title')
@parent Пользователи
@endsection
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Список пользователей</h1>
    {{-- <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <a href="{{ route('admin.sources.create') }}" class="btn btn-sm btn-outline-secondary">Добавить
                gjkmpjdfntkz</a>
        </div>
    </div> --}}
</div>
<div class="table-responsive">
    @include('inc.messages')
    <table class="table table-bordered">
        <thead>
            <th>ID</th>
            <th>Имя</th>
            <th>email</th>
            <th>Админ</th>
            <th>Изменено</th>
            <th>Опции</th>
        </thead>
        <tbody>
            @forelse ($usersList as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @if ($user->is_admin) Да @else Нет @endif
                </td>
                <td>
                    @if ($user->updated_at)
                    {{ $user->updated_at->format('d.m.Y H:i') }}
                    @endif
                </td>
                <td style="display: flex">
                    <form action="{{ route('admin.users.edit', $user) }}" method="get" class="me-2">
                        @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm">
                            Ред.
                        </button>
                    </form>
                    <form action="{{ route('admin.users.destroy', $user) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-outline-danger btn-sm">
                            Удл.
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4">Записей нет</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    {{ $usersList->links() }}
</div>
@endsection