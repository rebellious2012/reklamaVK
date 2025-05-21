<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        @include('layouts.alerts')
        <!-- Info boxes -->
        <div class="row">
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-injured"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('users.candidate')</span>
                        <span class="info-box-number">
                            {{$candidate_count}}
                            <small>@lang('users.pcs')</small>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-alt"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('users.activated')</span>
                        <span class="info-box-number">
                            {{ $active }}
                            <small>@lang('users.pcs')</small>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-times"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('users.deactivated')</span>
                        <span class="info-box-number">
                            {{ $deactive }}
                            <small>@lang('users.pcs')</small>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-user-tag"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('users.banned')</span>
                        <span class="info-box-number">
                            {{ $banned }}
                            <small>@lang('users.pcs')</small>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-slash"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('users.deleted')</span>
                        <span class="info-box-number">
                            {{ $deleted }}
                            <small>@lang('users.pcs')</small>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-2">
                <div class="info-box mb-3">
                    <span class="info-box-icon bg-info elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">@lang('users.total')</span>
                        <span class="info-box-number">
                            {{ $count_users }}
                            <small>@lang('users.pcs')</small>
                        </span>
                    </div><!-- /.info-box-content -->
                </div><!-- /.info-box -->
            </div><!-- /.col -->
        </div><!-- /.row -->


        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">@lang('users.filter')</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label>@lang('users.select-department'):</label>
                            @include('components.select-department')
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label>@lang('users.status_filter')</label>
                            <select class="select2 status_users" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                <option>Candidate</option>
                                <option>Activated</option>
                                <option>Deactivated</option>
                                <option>Banned</option>
                                <option>Deleted</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.card-body -->


        <div class="card card-warning card-outline">
            <div class="card-header">
                <h3 class="card-title">@lang('users.actions')</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <a class="btn btn-app bg-info button-info" data-toggle="modal" data-target="#modal-info">
                    <i class="fas fa-info-circle"></i> @lang('users.info_action')
                </a>
                <a class="btn btn-app history">
                    <span class="badge bg-info">200</span>
                    <i class="fas fa-tasks"></i> @lang('users.call_history')
                </a>
                <a class="btn btn-app" href="{{ route('call-control') }}">
                    <i class="fas fa-head-side-headphones"></i> @lang('users.call_control')
                </a>
                <a class="btn btn-app" href="{{ route('call-console') }}">
                    <i class="fas fa-phone-volume"></i> @lang('users.call-console')
                </a>
                @can('access-page', 'users_add')
                    <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-add">
                        <i class="fas fa-user-plus"></i> @lang('users.add')
                    </a>
                @endcan
                @can('access-page', 'users_edit')
                    <a class="btn btn-app bg-warning edit-link" href="#" data-base-url="{{ url('setting-users/') }}">
                        <i class="fas fa-user-edit"></i> @lang('users.edit')
                    </a>
                @endcan
                @can('access-page', 'users_activate')
                    <a class="btn btn-app bg-danger button-deactive" data-toggle="modal" data-target="#modal-deactive">
                        <i class="fas fa-user-times"></i> @lang('users.deactivate')
                    </a>
                    <a class="btn btn-app bg-teal button-active" data-toggle="modal" data-target="#modal-active">
                        <i class="fas fa-user-check"></i> @lang('users.activate')
                    </a>
                @endcan
                @can('access-page', 'users_delete')
                    <a class="btn btn-app bg-secondary button-delete" data-toggle="modal" data-target="#modal-delete">
                        <i class="fas fa-user-slash"></i> @lang('users.delete')
                    </a>
                    <a class="btn btn-app bg-lime button-undelete" data-toggle="modal" data-target="#modal-undelete">
                        <i class="fas fa-user-check"></i> @lang('users.undelete')
                    </a>
                @endcan
                @can('access-page', 'users_banned')
                    <a class="btn btn-app bg-orange banned-link" data-base-url="{{ url('/admin/banned-users') }}" data-toggle="modal" data-target="#modal-banned" data-accounts = "" >
                        <i class="fas fa-user-slash"></i> @lang('users.banne')
                    </a>
                @endcan
            </div><!-- /.card-body -->
        </div><!-- /.card -->


        <div class="card">
            <div class="card-header">
                <h3 class="card-title">@lang('users.account-list')</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('users.id')</th>
                        <th>@lang('users.callsign')</th>
                        <th>@lang('users.name')</th>
                        <th>Email</th>
                        <th>@lang('users.registration-date')</th>
                        <th>@lang('users.modified-date')</th>
                        <th>@lang('users.status')</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio{{ $user->id }}" name="customRadio" value="{{ $user->id }}" @if($user->accounts->count() > 0) data-accounts ="{{ $user->accounts->pluck('ID')->toJson() }}"  @endif @if($user->bannedUser && $user->bannedUser->count() > 0) data-banned ="{{ $user->bannedUser->pluck('ID')->toJson() }}"  @endif>
                                    <label for="customRadio{{ $user->id }}" class="custom-control-label">{{ $user->id }}</label>
                                </div>
                            </td>
                            <td>
                                @foreach ($user->accounts as $acc)
                                    <span class="badge {{$acc->getStatusBadgeClass()}}">{{$acc->ID}}</span>
                                @endforeach
                                @if($user->accounts->count() == 0)
                                    <span class="badge bg-info">Candidate</span>
                                @endif
                            </td>
                            <td>{{ $user->callsign }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->created_at }}</td>
                            <td>{{ $user->updated_at }}</td>
                            <td id="status-{{$user->id }}">
                                <span class="badge {{ $user->getStatusBadgeClass() }}">{{ $user->getStatusName() }} </span>
                                @if($user->bannedUser)
                                    @foreach($user->bannedUser as $bannedUser)
                                        <span id="banned-{{$bannedUser->ID }}" class="badge bg-orange">{{ $bannedUser?->User."-".$bannedUser?->Group }}</span>
                                    @endforeach
                                @endif
                                {{-- if soft deleted --}}
                                @if($user->deleted_at)
                                    <span class="badge bg-secondary">@lang('users.deleted')</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div><!-- /.card-body -->
        </div><!-- /.card -->


    </div><!-- /.container-fluid -->


    <div class="modal fade" id="modal-info">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title">@lang('users.add-user')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="quickForm-add" action="{{ route('setting-users.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @lang('users.modal-body17')
                        <div class="form-group row">
                            <label for="callsign" class="col-sm-2 col-form-label">@lang('users.callsign')</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="callsign" placeholder="@lang('users.callsign')" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">@lang('users.name')</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" placeholder="@lang('users.name')" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">@lang('users.department')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" disabled="" id="department">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->id }} - {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Email" disabled="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="language" class="col-sm-2 col-form-label">@lang('users.language')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" id="language" style="width: 100%;" disabled="">
                                    <option value="EN">English</option>
                                    <option value="RU">Russian</option>
                                    <option value="UA">Ukrainian</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notes" class="col-sm-2 col-form-label">@lang('users.admin-notes')</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="notes" placeholder="@lang('users.admin-notes')" disabled=""></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">@lang('users.status')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" disabled="" id="status">
                                    <option value="1">@lang('users.actived')</option>
                                    <option value="0">@lang('users.deactived')</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.modal-body -->
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('setting-users.store') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-success">
                        <h4 class="modal-title">@lang('users.add-user')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('users.modal-body18')
                        <div class="form-group row">
                            <label for="inputCallsign" class="col-sm-2 col-form-label">@lang('users.callsign')</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="callsign" placeholder="@lang('users.callsign')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">@lang('users.name')</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" name="name" placeholder="@lang('users.name')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">@lang('users.department')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->id }} - {{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">@lang('users.language')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="language">
                                    <option value="en">English</option>
                                    <option value="ru">Russian</option>
                                    <option value="uz">Uzbek</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputPassword" class="col-sm-2 col-form-label">@lang('users.password')</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputPassword" name="password" placeholder="@lang('users.password')">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputExperience" class="col-sm-2 col-form-label">@lang('users.admin-notes')</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="inputExperience" placeholder="@lang('users.admin-notes')" name="notes"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-2 col-form-label">@lang('users.status')</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="Active">
                                    <option value="1">@lang('users.actived')</option>
                                    <option value="0">@lang('users.deactived')</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.modal-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="#" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header bg-danger">
                        <h4 class="modal-title">@lang('users.delete-user')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @lang('users.modal-body19')
                        <input type="hidden" name="user_id" id="delete_user_id">
                        @lang('users.modal-body20')
                    </div><!-- /.modal-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-deactive">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">@lang('users.user-deactivation')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="quickForm-deactivate" action="{{ route('setting-users.deactivate') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @lang('users.modal-body21')
                        <input type="hidden" name="user_id" id="deactivate_user_id">
                        @lang('users.modal-body22')
                    </div><!-- /.modal-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-active">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-teal">
                    <h4 class="modal-title">@lang('users.user-activation')</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="quickForm-activate" action="{{ route('setting-users.activate') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        @lang('users.modal-body23')
                        <input type="hidden" name="user_id" id="activate_user_id">
                        @lang('users.modal-body24')
                    </div><!-- /.modal-body -->
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                        <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div class="modal fade" id="modal-undelete">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <form action="{{ route('setting-users.restore') }}" method="POST">
                    @csrf
                    <div class="modal-header bg-lime">
                        <h4 class="modal-title">@lang('users.undelete-user')</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="quickForm-undelete">
                        <div class="modal-body">
                            @lang('users.modal-body25')
                            <input type="hidden" name="user_id" id="undelete_user_id">
                            @lang('users.modal-body26')
                        </div><!-- /.modal-body -->
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                            <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
                        </div>
                    </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    @include("users.includes.modals.bannedUsers.banned")


    @include("users.includes.modals.bannedUsers.banned_response")
</section><!-- /.content -->
