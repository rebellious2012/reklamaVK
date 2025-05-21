@extends('admin.layouts.app')
@section('title', 'Редактирование пользователя')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Редагування користувача</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.home') }}">Головна</a>
                        </li>
                        {{--                        <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Пользователи</a></li>--}}
                        <li class="breadcrumb-item active">Редагування</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
@include('admin.layouts.alerts')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" id="user_update_form">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Логін</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputFIO" class="col-sm-2 col-form-label">ФІО</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputFIO" name="fio" value="{{ $account->fio ?? old('fio') ?? '' }}" placeholder="ФІО" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="col-sm-2 col-form-label">Телефон</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ $account->phone ??  old('phone') ?? '' }}" placeholder="Телефон" required>
                            </div>
                        </div>
                        <!-- Роли -->
                        @if(Gate::allows('edit-roles'))
                            <div class="form-group">
                                <label for="role">Роль</label>
                                <select class="form-control" id="role" name="role">
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }} >{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @else
                            {{-- just role Client Role --}}
                            <div class="form-group">
                                <label for="role">Роль</label>
                                <select class="form-control" id="role" name="role" disabled>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}" {{ $user->roles->contains($role->id) ? 'selected' : '' }} disabled> {{ $role->name }}</option>
                                        @endforeach
                                        @if ($role->name === 'Client')
                                            <option value="{{ $role->id }}" selected disabled> {{ $role->name }}</option>
                                        @endif
                        @endif
                        <div class="form-group">
                            <label for="inputNotes" class="col-sm-2 col-form-label">Нотатки</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputNotes" placeholder="Нотатки" name="notes">{!! $account->notes ?? old('notes') ?? '' !!}</textarea>
                            </div>
                        </div>

                        <!-- Этапы и шаги -->

                        <div class="form-group">
                            <h4 for="stages">Етапы та Кроки</h4>
                            <div style="display:flex;">
                                @if ($hasCompletedStages)
                                    <h5>Пройдені Етапи:&nbsp;</h5>
                                    @foreach($assignedStages as $stageName1)
                                        {{--                                    @if ($stageName1->pivot->status === "completed")--}}
                                        <h5 style="padding-right: 1%; color:grey;"> {{ $stageName1->name }};&nbsp;</h5>
                                    @endforeach
                                @else
                                    <h5 style="padding-right: 1%; color:#6528a3; ">Немає ще жодного завершеного Етапу!!!</h5>
                                @endif
                            </div>

                            @if (!$hasActiveStage)
                                <h5 style="padding-right: 1%; color:red;font-weight: bold;">Поточний Етап не призначено!!!</h5>
                            @endif
                            <div class="stage-block1 mb-3">
                                @include("admin.users.includes.stages.pending.index")
                            </div>
                            @includeWhen(!$hasActiveStage, "admin.users.includes.stages.pending.select.index")
                        </div>

                        <button type="submit" class="btn btn-primary">Зберегти зміни</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
