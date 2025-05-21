@extends('admin.layouts.app')
@section('title', 'Редактирование пользователя')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Создание пользователя</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Главная</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>--}}
                        <li class="breadcrumb-item active">Создание</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf

                        <!-- Имя -->
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        <!-- Пароль -->
                        <div class="form-group">
                            <label for="password">Пароль</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <!-- Подтверждение пароля -->
                        <div class="form-group">
                            <label for="password_confirmation">Подтверждение пароля</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                        </div>

                        <!-- Роли -->
                        @if(Gate::allows('edit-roles'))

                            <div class="form-group">
                                <label for="roles">Роли</label>
                                <select id="roles" name="roles[]" class="form-control" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">Создать</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection