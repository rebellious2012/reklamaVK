@extends('admin.layouts.app')
@section('title', 'Редактирование пользователя')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редактирование роли</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Главная</a></li>
{{--                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>--}}
                        <li class="breadcrumb-item active">Редактирование</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('roles.update', $role->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Наименование</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $role->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <input type="text" class="form-control" id="description" name="description" value="{{ $role->description }}" required>
                        </div>
{{--                        <div class="form-group">--}}
{{--                            <label for="role">Роль</label>--}}
{{--                            <select class="form-control" id="role" name="role">--}}
{{--                                <option value="user" {{ $role->role == 'user' ? 'selected' : '' }}>Пользователь</option>--}}
{{--                                <option value="admin" {{ $role->role == 'admin' ? 'selected' : '' }}>Администратор</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <button type="submit" class="btn btn-primary">Сохранить изменения</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection