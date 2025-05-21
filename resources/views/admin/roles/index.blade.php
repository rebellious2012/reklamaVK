@extends('admin.layouts.app')
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@lang('admin/pages.roles.index')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.home') }}">Dashboard</a></li>
              <li class="breadcrumb-item active">@lang('admin/pages.roles.index')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
{{--        @include('layouts.alerts')--}}
        <div class="card card-primary card-outline">
{{--            <form method="post" action="{{ route('roles.update', 1) }}">--}}
{{--                @csrf--}}
{{--                @method('PUT')--}}
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-edit"></i>
{{--              @lang('roles_index.system-roles')--}}
            </h3>
          </div>
          <div class="card-body">
            <h4>@lang('admin/pages.roles.index')</h4>
            <div class="row">
{{--              <div class="col-5 col-sm-3">--}}
{{--                <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">--}}
{{--                  <a class="nav-link active" id="vert-tabs-home-tab" data-toggle="pill" href="#vert-tabs-home" role="tab" aria-controls="vert-tabs-home" aria-selected="true">@lang('roles_index.user')8888888888</a>--}}
{{--                  --}}{{-- <a class="nav-link" id="vert-tabs-profile-tab" data-toggle="pill" href="#vert-tabs-profile" role="tab" aria-controls="vert-tabs-profile" aria-selected="false">@lang('roles_index.manager')</a> --}}
{{--                  <a class="nav-link" id="vert-tabs-messages-tab" data-toggle="pill" href="#vert-tabs-messages" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">@lang('roles_index.administrator')</a>--}}
{{--                </div>--}}
{{--              </div>--}}
              <div class="col-12 col-sm-12">

                <div class="tab-content" id="vert-tabs-tabContent">
                  <div class="tab-pane text-left fade show active" id="vert-tabs-home" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                    <div class="card">
                      <div class="card-header">
{{--                        <h3 class="card-title">@lang('roles_index.access-rights-list')</h3>--}}
                      </div><!-- ./card-header -->
                      <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>id</th>
                                  <th>Роль</th>
                                  <th>Описание</th>
{{--                                  <th>Email</th>--}}
{{--                                  <th>@lang('users.registration-date')</th>--}}
{{--                                  <th>@lang('users.modified-date')</th>--}}
{{--                                  <th>@lang('users.status')</th>--}}
                                  <th>Edit</th>
                              </tr>
                              </thead>
                              <tbody>
                              @foreach ($roles as $role)
                                  <tr>
                                      <td>
                                      </td>
                                      <td>
                                          {{ $role->id }}
                                      </td>
                                      <td>{{ $role->name }}</td>
{{--                                      <td>{{ $role->name }}</td>--}}
                                      <td>{{ $role->description }}</td>
{{--                                      <td>{{ $role->created_at }}</td>--}}
{{--                                      <td>{{ $role->updated_at }}</td>--}}
{{--                                      <td id="status-{{$role->id }}">--}}
{{--                                      </td>--}}
                                      <td><a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary btn-sm">
                                              Редактировать
                                          </a>
                                      </td>
                                  </tr>
                              @endforeach
                              </tbody>
                          </table>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                  </div><!-- /.tab-pane -->
                  {{-- <div class="tab-pane fade" id="vert-tabs-profile" role="tabpanel" aria-labelledby="vert-tabs-profile-tab">
				  @lang('roles_index.vert-tabs-profile')
                     </div> --}}
                  <div class="tab-pane fade" id="vert-tabs-messages" role="tabpanel" aria-labelledby="vert-tabs-messages-tab">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">@lang('roles_index.access-rights-list')</h3>
                        </div><!-- ./card-header -->
                        <div class="card-body">
                          <table class="table table-bordered table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>@lang('roles_index.object')</th>
                                <th>@lang('roles_index.status')</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                @php
                                    $statuses = json_decode($role->description);
                                @endphp
                                <tr data-widget="expandable-table" aria-expanded="false">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $role->description }}</td>
                                    <td>
                                      <select id="inputStatus" class="form-control custom-select" name="permissions[admin][{{$role->name}}]">
{{--                                        @foreach ($statuses as $status)--}}
{{--                                          <option value="{{ $status }}"--}}
{{--                                          @if ($permission->has('rolePermissions'))--}}
{{--                                          @if ($permission->rolePermissions->where('role', 'admin')->first()?->status == $status)--}}
{{--                                            selected--}}
{{--                                          @endif--}}
{{--                                        @endif--}}
{{--                                          >{{ $status }}</option>--}}
{{--                                        @endforeach--}}
{{--                                      </select>--}}
                                    </td>
                                  </tr>
                                  <tr class="expandable-body">
                                    <td colspan="5">
                                      <p>
                                        @lang("roles." . str_replace('roles.', '', $role->description))
                                      </p>
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                        </div><!-- /.card-body -->
                      </div><!-- /.card -->
                  </div>
                </div><!-- /.tab-content -->

              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.card -->
{{--          <div class="card-footer">--}}
{{--              <a href="" class="btn btn-default">@lang('roles_index.сancel')</a>--}}
{{--            <a href="{{route('setting-users.index')}}" class="btn btn-default">@lang('roles_index.сancel')</a>--}}
{{--            <input type="submit" value="@lang('roles_index.save')" class="btn btn-success float-right">--}}
{{--          </div><!-- /.card-footer -->--}}
{{--        </form>--}}
        </div><!-- /.card -->

      </div>
      <!-- /.container-fluid -->
    </section>
  @endsection
