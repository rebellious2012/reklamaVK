@extends('layouts.app')
@section('title', 'Settings | Profile')
@section('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@lang('users.profile')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('users.home')</a></li>
              <li class="breadcrumb-item active">{{$user->callsign}} @lang('users.profile')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('layouts.alerts')
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                  @isset($user->photo)
                      src="{{asset('storage/'.$user->photo)}}"
                    @else
                    src="{{asset('dist/img/user1-128x128.jpg')}}"
                  @endisset
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{ $user->callsign }}</h3>

                <p class="text-muted text-center">{{ $user->name }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>@lang('users.id')</b>
                    @foreach ($user->accounts as $account)
                        <a class="float-right mr-1"><span class="badge
                            @if($account->Active == 1)
                             bg-success
                            @else
                                bg-danger
                            @endif
                             ">{{ $account->ID }}</span></a>
                    @endforeach
                  </li>
                  <li class="list-group-item">
                    <b>@lang('users.rpt-id')</b>
                        @foreach ($user->repiters as $repiter)
                        <a class="float-right mr-1"><span class="badge
                            @if($repiter->state == 1)
                             bg-success
                            @else
                                bg-warning
                            @endif
                             ">{{ $repiter->ID }}</span></a>
                        @endforeach
                  </li>
                  <li class="list-group-item">
                    <b>@lang('users.hs-id')</b>
                        @foreach ($user->hotspots as $hotspot)
                        <a class="float-right mr-1"><span class="badge
                            @if($hotspot->state == 1)
                             bg-success
                            @else
                                bg-warning
                            @endif
                             ">{{ $hotspot->ID }}</span></a>
                        @endforeach
                  </li>
                  <li class="list-group-item">
                    <b>@lang('users.callsign')</b> <a class="float-right">{{ $user->callsign }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>@lang('users.name')</b> <a class="float-right">{{ $user->name }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                  </li>
                </ul>

                <a class="btn btn-success btn-block"><b>{{ $user->getStatusName() }}</b></a>
              </div><!-- /.card-body -->
            </div><!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">@lang('users.information')</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-calendar-week mr-1"></i> @lang('users.registration-date')</strong><a class="float-right">{{ $user->created_at }}</a>
                <hr>
                <strong><i class="fas fa-calendar-edit mr-1"></i> @lang('users.last-edit')</strong><a class="float-right">{{ $user->updated_at }}</a>
                <hr>
                <strong><i class="fas fa-calendar-check mr-1"></i> @lang('users.last-login')</strong> <a class="float-right">2024-01-27 13:26:47</a>
               {{-- check if user is admin --}}
                @if (auth()->user()->isAdmin())
                <hr>
                <strong><i class="far fa-file-alt mr-1"></i> @lang('users.administrators-note')</strong>
                <p class="text-muted">
                    {{ $user->notes }}
                </p>
            @endif
                </div><!-- /.card-body -->
            </div><!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">@lang('users.roles')</h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-wallet mr-1"></i> @lang('users.roles')</strong>
                <p class="text-muted">
                <span class="badge bg-primary">@lang('users.user')</span>
                @if ($user->isOperator())
                <span class="badge bg-primary">@lang('users.operator')</span>
                @endif
                @if ($user->isAdmin())
                <span class="badge bg-primary">@lang('users.administrator')</span>
                @endif
                @foreach ($user->operator as $device)
                    <span class="badge
                    @if($device->device->state == 1)
                                bg-success
                    @else
                    bg-warning
                    @endif
                    ">{{$device->device_id}}</span>
                @endforeach
                @foreach ($user->administrator as $department)
                <span class="badge
                @if($department->department->Active == 1)
                bg-success
                @else
                bg-danger
                @endif
                ">{{$department->department_id}}</span>
                @endforeach
                <hr>
                @foreach ($user->operator as $device)
                    <span class="badge
                    @if ($device->read == 1)
                    bg-success
                    @else
                    bg-danger
                    @endif
                    ">HS_READ_{{$device->device_id}}</span>
                    <span class="badge
                    @if ($device->write == 1)
                    bg-success
                    @else
                    bg-danger
                    @endif
                    ">HS_EDIT_{{$device->device_id}}</span>
                    <span class="badge
                    @if ($device->manage_sysops == 1)
                    bg-success
                    @else
                    bg-danger
                    @endif
                    ">HS_MANAGE_SYSOPS_{{$device->device_id}}</span>
                    <hr>
                  @endforeach
                  @foreach ($user->administrator as $department)
                  <span class="badge
                    @if ($department->read == 1)
                    bg-success
                    @elseif ($department->read == 2)
                    bg-warning
                    @else
                    bg-danger
                    @endif
                    ">DEP_READ_{{$department->department_id}}</span>
                    <span class="badge
                    @if ($department->edit == 1)
                    bg-success
                    @elseif ($department->edit == 2)
                    bg-warning
                    @else
                    bg-danger
                    @endif
                    ">DEP_EDIT_{{$department->department_id}}</span>
                    <span class="badge
                    @if ($department->manage == 1)
                    bg-success
                    @elseif ($department->manage == 2)
                    bg-warning
                    @else
                    bg-danger
                    @endif
                    ">DEP_MANAGE_SYSOPS_{{$department->department_id}}</span>
                    <span class="badge
                    @if ($department->dispatching == 1)
                    bg-success
                    @else
                    bg-danger
                    @endif
                    ">DEP_DISPATCH_{{$department->department_id}}</span>
                    <span class="badge
                    @if ($department->addition == 1)
                    bg-success
                    @else
                    bg-danger
                    @endif
                    ">DEP_ADD_{{$department->department_id}}</span>
                    <hr>
                  @endforeach
                </p>
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#info" data-toggle="tab">@lang('users.info_action')</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">@lang('users.settings')</a></li>
                  <li class="nav-item"><a class="nav-link" href="#api-key" data-toggle="tab">@lang('users.passwords')</a></li>
                  @if ($user->department_id > 0)
                  <li class="nav-item"><a class="nav-link" href="#id" data-toggle="tab">ID</a></li>
                  @endif
                  <li class="nav-item"><a class="nav-link" href="#subscriptions" data-toggle="tab">@lang('users.subscriptions')</a></li>
                    @if($canPasswordChange)
                  <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">@lang('users.password')</a></li>
                    @endif
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="info">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">@lang('users.account-log')</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('users.search')" id="search1">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-logs">
                          <thead>
                            <tr>
                              <th>@lang('users.date')</th>
                              <th>@lang('users.subject')</th>
                              <th>@lang('users.action')</th>
                              <th>@lang('users.target')</th>
                              {{-- <th>@lang('users.target')</th> --}}

                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($loging as $log)
                            <tr>
                                <td>{{$log->created_at}}</td>
                                <td>{{class_basename($log->subject_type)}}</td>
                                <td>{{$log->event}}</td>
                                <td>{{$log->description}}</td>
                                {{-- <td>{{$log->changes() }}</td> --}}
                              </tr>
                            @endforeach


                          </tbody>
                        </table>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3 class="card-title">@lang('users.email-log')</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('users.search')" id="search2">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table_mail">
                          <thead>
                            <tr>
                              <th>@lang('users.date')</th>
                              <th>@lang('users.type')</th>
                              <th>@lang('users.subject')</th>
                              <th>@lang('users.status')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($mail_log as $mail)
                            <tr>
                                <td>{{$mail->created_at->format('n-j-Y')}}</td>
                                <td>
                                    @if ($mail->to_user_id == $user->id)
                                        Incoming
                                    @else
                                        Outgoing
                                    @endif
                                <td>{{$mail->subject}}</td>
                                <td>
                                    @if ($mail->is_read == 1)
                                        Read
                                    @else
                                        Unread
                                    @endif
                              </tr>
                            @endforeach
                          </tbody>
                        </table>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="row">
                      <div class="col-12">
                        <a href="{{route('setting-users.index')}}" class="btn btn-secondary">@lang('users.cancel')</a>
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="settings">
                    <form class="form-horizontal" action="{{ route('setting-users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="form-group row">
                        <label for="callsign" class="col-sm-2 col-form-label">@lang('users.callsign')</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="callsign" name="callsign" value="{{$user->callsign}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">@lang('users.name')</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">@lang('users.department')</label>
                        <div class="col-sm-10">
                          <select class="form-control select2" style="width: 100%;" name="department_id">
                            @foreach ($departments as $department)
                        <option value="{{$department->id}}"
                            @if ($user->department_id == $department->id)
                                selected
                            @endif
                            >{{ $department->id }} - {{ $department->name }}</option>

                        @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="exampleInputFile" class="col-sm-2 col-form-label">@lang('users.photo')</label>
                        <div class="input-group col-sm-10">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="photo" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">@lang('users.choose-file')</label>
                          </div>
                        </div>
                      </div>
                      @if (auth()->user()->isAdmin())
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">@lang('users.admin-notes')</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" id="inputExperience" name="notes">{{$user->notes}}</textarea>
                        </div>
                      </div>
                        @endif
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">@lang('users.email-notifications')</label>
                        <div class="col-sm-10">
                          <select id="email_notifications" class="form-control custom-select" name="email_notifications">
                            <option value="1" @if ($user->email_notifications == 1) selected @endif>Active</option>
                            <option value="0" @if ($user->email_notifications == 0) selected @endif>Disabled</option>
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">@lang('users.language')</label>
                        <div class="col-sm-10">
                          <select id="inputStatus" class="form-control custom-select" name="language">
                            @foreach ($languages as $language)
                            <option value="{{$language->code}}"
                                 @if ($user->language == $language->code) selected @endif
                                 >{{$language->name}}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputExperience" class="col-sm-2 col-form-label">@lang('users.time-zone')</label>
                        <div class="col-sm-10">
                          <select id="inputStatus" class="form-control custom-select">
                            <option value="-12">-12 - Baker Island Time</option>
                            <option value="-11">-11 - Niue Time</option>
                            <option value="-10">-10 - Hawaii-Aleutian Standard Time</option>
                            <option value="-9">-9 - Alaska Standard Time</option>
                            <option value="-8">-8 - Pacific Standard Time</option>
                            <option value="-7">-7 - Mountain Standard Time</option>
                            <option value="-6">-6 - Central Standard Time</option>
                            <option value="-5">-5 - Eastern Standard Time</option>
                            <option value="-4">-4 - Atlantic Standard Time</option>
                            <option value="-3">-3 - Argentina Time</option>
                            <option value="-2">-2 - Fernando de Noronha Time</option>
                            <option value="-1">-1 - Azores Time</option>
                            <option value="0" selected="">0 - UTC</option>
                            <option value="1">+1 - West Africa Time</option>
                            <option value="2">+2 - Central Africa Time</option>
                            <option value="3">+3 - Moscow Standard Time</option>
                            <option value="4">+4 - Gulf Standard Time</option>
                            <option value="5">+5 - Pakistan Standard Time</option>
                            <option value="6">+6 - Bangladesh Standard Time</option>
                            <option value="7">+7 - Indochina Time</option>
                            <option value="8">+8 - China Standard Time</option>
                            <option value="9">+9 - Japan Standard Time</option>
                            <option value="10">+10 - Australian Eastern Standard Time</option>
                            <option value="11">+11 - Solomon Islands Time</option>
                            <option value="12">+12 - New Zealand Standard Time</option>
                          </select>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <a href="{{route('setting-users.index')}}" class="btn btn-secondary">@lang('users.cancel')</a>
                          <input type="submit" value="@lang('users.save-changes')" class="btn btn-success float-right">
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="api-key">
                    <div class="card">
                      <div class="card-header">
                        <h3 class="card-title">@lang('users.passwords-list')</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('users.search')" id="search3">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>@lang('users.name')</th>
                                <th>@lang('users.type')</th>
                                <th>@lang('users.id')</th>
                                <th>@lang('users.created')</th>
                                <th>@lang('users.actions')</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($passwords as $password)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>
                                    @if ($password->Kind == '0')
                                        Application
                                    @elseif ($password->Kind == '1')
                                        RPT/HS/USER
                                    @elseif($password->Kind == '2')
                                        Network
                                    @elseif($password->Kind == '3')
                                        Terminal
                                    @elseif($password->Kind == '9')
                                        Node
                                    @elseif($password->Kind == '10')
                                        Fingerprint
                                    @elseif($password->Kind == '16')
                                    AIR Security
                                    @elseif($password->Kind == '20')
                                    Dispatcher Console
                                    @else
                                    {{$password->Kind}}
                                    @endif
                                </td>
                                    <td>@lang('users.password')</td>
                                    <td>{{$password->ID}}</td>
                                    <td>{{$password->Created}}</td>

                                    <td class="project-actions text-right">
                                      <a class="btn btn-danger btn-sm delete-pass" data-toggle="modal" data-target="#modal-delete-apikey" data-password-id="{{$password->ID}}" data-password-kind="{{$password->Kind}}">
                                          <i class="fas fa-trash"></i> @lang('users.delete')
                                      </a>
                                    </td>
                                  </tr>
                                @endforeach
                            </tbody>
                          </table>
                      </div><!-- /.card-body -->
                      <div class="card-footer">
					  @lang('users.card-footer')
                      </div><!-- /.card-footer -->
                    </div><!-- /.card -->
                    <div class="row">
                      <div class="col-12">
                        <a href="{{route('setting-users.index')}}" class="btn btn-secondary">@lang('users.cancel')</a>
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="id">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">@lang('users.personal-radio-id-list')</h3>
                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('users.search')">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>@lang('users.id')</th>
                              <th>@lang('users.created')</th>
                              <th>@lang('users.modified')</th>
                              <th>@lang('users.actions')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($user->accounts as $account)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$account->ID}}</td>
                                <td>{{$account->created_at}}</td>
                                <td>{{$account->updated_at}}</td>
                                <td class="project-actions text-right">

                                    @can('access-page','users_id_active')
                                    @if($account->Active == 1)
                                        <a class="btn btn-success btn-sm disable-btn_js" data-account-id="{{ $account->ID }}" data-action-url="{{ route('admin.disableAccount.disable', ['id' =>$account->ID]) }}" data-toggle="modal" data-target="#modal-disable-pid">
                                            <i class="fas fa-unlock-alt"></i> @lang('users.enabled')
                                        </a>
                                    @else
                                        <a class="btn btn-danger btn-sm enable-btn_js" data-account-id="{{ $account->ID }}" data-action-url="{{ route('admin.disableAccount.enable', ['id' =>$account->ID]) }}" data-toggle="modal" data-target="#modal-enable-pid">
                                            <i class="fas fa-lock-alt"></i> @lang('users.disabled')
                                        </a>
                                    @endif
                                        <a class="btn btn-danger btn-sm del-pid" data-toggle="modal" data-account-id="{{ $account->ID }}" data-target="#modal-delete-pid">
                                            <i class="fas fa-trash"></i> @lang('users.delete')
                                        </a>
                                    @endcan


                                </td>
                              </tr>
                            @endforeach
                            @can('access-page','users_id_active')
                            <tr>
                              <td>*</td>
                              <td><input name="" type="number" disabled="" class="form-control" value="{{$new_account_id}}"></td>
                              <td></td>
                              <td></td>
                              <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" data-toggle="modal" data-target="#modal-add-pid" data-account-id="{{$new_account_id}}" data-user-id="{{$user->id}}">
                                    <i class="fas fa-plus"></i> @lang('users.add')
                                </a>
                              </td>
                            </tr>
                            @endcan
                          </tbody>
                        </table>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="card card-warning">
                      <div class="card-header">
                        <h3 class="card-title">@lang('users.repeater-id-list')</h3>

                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('users.search')">

                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>@lang('users.id')</th>
                              <th>@lang('users.created')</th>
                              <th>@lang('users.modified')</th>
                              <th>@lang('users.actions')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($user->repiters as $repiter)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$repiter->ID}}</td>
                                <td>{{$repiter->created_at}}</td>
                                <td>{{$repiter->updated_at}}</td>
                                <td class="project-actions text-right">
                                    @can('access-page','users_id_active')
                                    @if($repiter->state == 1)
                                    <a class="btn btn-success btn-sm btn-disable-rid" data-toggle="modal" data-repiter-id="{{$repiter->ID}}" data-target="#modal-disable-rid">
                                        <i class="fas fa-unlock-alt"></i> @lang('users.enabled')
                                    </a>
                                    @else
                                    <a class="btn btn-danger btn-sm btn-enable-rid" data-toggle="modal" data-repiter-id="{{$repiter->ID}}" data-target="#modal-enable-rid">
                                        <i class="fas fa-lock-alt"></i> @lang('users.disabled')
                                    </a>
                                    @endif

                                  <a class="btn btn-danger btn-sm btn-del-rid" data-toggle="modal" data-repiter-id="{{$repiter->ID}}" data-target="#modal-delete-rid">
                                      <i class="fas fa-trash"></i> @lang('users.delete')
                                  </a>
                                  @endcan
                                </td>
                              </tr>
                            @endforeach
                            @can('access-page','users_id_active')
                            <tr>
                              <td>6</td>
                              <td><input id="" type="number" disabled="" class="form-control" value="{{$new_repiter_id}}"></td>
                              <td></td>
                              <td></td>
                              <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm add-repiter" data-toggle="modal" data-target="#modal-add-rid" data-repiter-id="{{$new_repiter_id}}" data-user-id="{{$user->id}}">
                                    <i class="fas fa-plus"></i> @lang('users.add')
                                </a>
                              </td>
                            </tr>
                            @endcan
                          </tbody>
                        </table>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="row">
                      <div class="col-12">
                        <a href="{{route('setting-users.index')}}" class="btn btn-secondary">@lang('users.cancel')</a>
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="subscriptions">
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">@lang('users.subscriptions-group-list')</h3>
                        <div class="card-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="@lang('users.search')">
                            <div class="input-group-append">
                              <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                              </button>
                            </div>
                          </div>
                        </div>
                      </div><!-- /.card-header -->
                      <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>@lang('users.group-id')</th>
                              <th>@lang('users.personal-id')</th>
                              <th>@lang('users.created')</th>
                              <th>@lang('users.modified')</th>
                              <th>@lang('users.actions')</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$subscription->Group}}</td>
                                <td>{{$subscription->ID}}</td>
                                <td>{{$subscription->Created}}</td>
                                <td>{{$subscription->Modified}}</td>
                                <td class="project-actions text-right">
                                    @if ($subscription->Active == 1)
                                    <a class="btn btn-success btn-sm dis-subscr" data-toggle="modal" data-target="#modal-disable-subscription" data-subscription-number="{{$subscription->number}}">
                                        <i class="fas fa-unlock-alt"></i> @lang('users.enabled')
                                    </a>
                                    @else
                                    <a class="btn btn-danger btn-sm enable-subscr" data-toggle="modal" data-target="#modal-enable-subscription" data-subscription-number="{{$subscription->number}}">
                                        <i class="fas fa-lock-alt"></i> @lang('users.disabled')
                                    </a>
                                    @endif
                                  <a class="btn btn-danger btn-sm delete-subscr" data-toggle="modal" data-target="#modal-delete-subscription" data-subscription-number="{{$subscription->number}}">
                                      <i class="fas fa-trash"></i> @lang('users.delete')
                                  </a>
                                </td>
                              </tr>
                            @endforeach
                            <tr>
                              <td>*</td>
                              <td>
                                <select class="form-control select2 departments" style="width: 100%;">
                                    @foreach ($departments as $department)
                                    <option value="{{$department->id}}"
                                        @if ($user->department_id === $department->id)
                                            selected
                                        @endif
                                        >{{ $department->id }} - {{ $department->name }}</option>

                                    @endforeach
                                </select>
                              </td>
                              <td>
                                <select class="form-control  groups" style="width: 100%;" id="group_id">
                                    @foreach ($groups as $group)
                                    <option value="{{$group->ID}}" data-department="{{$group->department_id}}">
                                        {{ $group->ID }} - {{ $group->Name }}
                                    </option>
                                    @endforeach
                                </select>
                              </td>
                              <td>
                                <select class="form-control select2" style="width: 100%;" id="account_id">
                                    @foreach ($user->accounts as $account)
                                        <option value="{{$account->ID}}">{{$account->ID}}</option>
                                    @endforeach
                                </select>
                              </td>
                              <td></td>
                              <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm add-subscr" data-toggle="modal" data-target="#modal-add-subscription">
                                    <i class="fas fa-plus"></i> @lang('users.add')
                                </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </div><!-- /.card-body -->
                    </div><!-- /.card -->
                    <div class="row">
                      <div class="col-12">
                        <a href="{{route('setting-users.index')}}" class="btn btn-secondary">@lang('users.cancel')</a>
                      </div>
                    </div>
                  </div><!-- /.tab-pane -->
                  <div class="tab-pane" id="password">
                    <form class="form-horizontal" action="{{ route('setting-users.password-update')}}" method="POST">
                        @csrf
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                      <div class="form-group row">
                        <label for="inputCallsign" class="col-sm-2 col-form-label">@lang('users.password')</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="@lang('users.password')">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputCallsign" class="col-sm-2 col-form-label">@lang('users.сonfirm')</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('users.confirm-password')">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-12">
                          <a href="{{route('setting-users.index')}}" class="btn btn-secondary">@lang('users.cancel')</a>
                          <input type="submit" value="@lang('users.save-changes')" class="btn btn-success float-right">
                        </div>
                      </div>
                    </form>
                  </div><!-- /.tab-pane -->
                </div><!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
      {{-- <div class="modal fade" id="modal-add-apikey">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">@lang('users.add-api-key')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body')
              <div class="form-group row">
                <label for="inputExperience" class="col-sm-2 col-form-label">@lang('users.api-key')</label>
                <div class="col-sm-10">
                  <textarea id="api"class="form-control" rows="3" placeholder="@lang('users.enter-password-key')">eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiMjM4YmE2YjUzNzhkNDgyOTliMmRkZjY2NzI5Y2FhMjUxNDhjZTI1NmM4YmE0MTY2Yjg1MTVmYzEwZjQ5M2ZmM2FmNzIxMTUwODk3ZmE3ZmMiLCJpYXQiOjE3MDc4MTY1MzEuNjYyNjI0LCJuYmYiOjE3MDc4MTY1MzEuNjYyNjI2LCJleHAiOjQ4NjM0OTAxMzEuNjU2Mjg3LCJzdWIiOiIxMSIsInNjb3BlcyI6W119.PwkwCgjnNBPn2348OOKCdxDpnsAPdT4TFLgYI8Jtnll9B9uk2ed7a67dJ0kKdWJeFJE9S3tLv3FfsTWN7fxbFPkt428g3_BKCazdEw7vXPCJ8HtpCUM4R7jLgRd_stoMkHgZsAwK9I4Bd2_-iJzPAKhRCmKldQ2rcmbuc4HHziYnTIiO7EXmInl6uHI7AthnF_71Fy4k--lKAxyFhAxAEiF7ekVhommsJ9msQzh0qmru-Aoxh-91Nk6l75Euzcto8zVUq010U0QSndFdXgRM6ZZ8Ixr_nxEXl4JFyRtdo2YqGF6E72u1uxClfyRP4PVevRbEOgkzEQ-d7vLSb4qHfJM1GkHf8cUvYoYYXgKZR3g8vkk6MBPbUS1O7sEBWrGdo47EDYbffcvS7QIhq90lGF7__FKREx04wBCZovBrFvgjxA2t3PExF3pFlmXWU_GrD61v0zyGdC2gXkSkOuLZeN_SxkFQkeZOGUaAtJSmoDIiEtBSq2_ofJfabEd4AQzJNmWV7lk3-6_MYhbJ8JXXpuIxX3_9oj-I8JbfVXxqJLFg7_XGFiH5ubkIbnuIFnwOolgEgysoypUeE0-4T95u9zIsR-za9hST_xTlxEyHMJGqR_AFX0-zALHChrYA2F9j1Avp0FJpli9qyA7VDoHtGBFtXUoQ_mOGjcYV6gAsA</textarea>
                </div>
              </div>
              <div class="form-group row">
                <label for="inputName" class="col-sm-2 col-form-label">@lang('users.qr-key')QR Key</label>
                <div class="col-sm-10 d-flex justify-content-center">
                  <img src="{{asset('dist/img/api-key/1.png')}}" alt="API Key">
                </div>
              </div>
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="button" class="btn btn-success">@lang('users.copy-to-clipboard')</button>
              <button type="button" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal --> --}}
      <div class="modal fade" id="modal-delete-apikey">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('passwords.destroy') }}" method="POST">
                @csrf
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('users.delete-api-key')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body2')
                <input type="hidden" id="modalPasswordId" name="id" value="">
                <input type="hidden" id="modalPasswordKind" name="kind" value="">
				@lang('users.modal-body3')
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-add-pid">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="addPidForm" action="{{ route('accounts.create') }}" method="POST">
                @csrf
            <div class="modal-header bg-info">
              <h4 class="modal-title">@lang('users.add-personal-radio-id')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body4')
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
                <input type="hidden" id="modalUserId" name="user_id" value="{{$user->id}}">
                <input type="hidden" id="modalAccountId" name="account_id" value="">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-delete-pid">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('accounts.destroy')}}" method="POST">
                @csrf
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('users.delete-personal-radio-id')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body5')
                <input type="hidden" id="modalAccountId" name="id" value="">
				@lang('users.modal-body6')
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
        @include('users.includes.modals.personalRadioID.modal-disable-pid')
        @include('users.includes.modals.personalRadioID.modal-enable-pid')
      <div class="modal fade" id="modal-add-rid">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form id="addRidForm" action="{{ route('information-repeaters.store') }}" method="POST">
                @csrf
            <div class="modal-header bg-info">
              <h4 class="modal-title">@lang('users.add-repeater-radio-id')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body7')
              <input type="hidden" id="modalUserId" name="user_id" value="{{$user->id}}">
                <input type="hidden" id="repiterId" name="repiterId" value="">
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-delete-rid">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                @method('DELETE')
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('users.delete-repeater-radio-id')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body8')
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-disable-rid">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('repiters-disable') }}" method="POST">
                @csrf
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('users.disable-repeater-radio-id')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			@lang('users.modal-body9')
              <input type="hidden" id="repiterId" name="id" value="">
			  @lang('users.modal-body10')
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-enable-rid">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <form action="{{ route('repiters-enable') }}" method="POST">
                @csrf
            <div class="modal-header bg-success">
              <h4 class="modal-title">@lang('users.enable-repeater-radio-id-wtf')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			 @lang('users.modal-body11')
              <input type="hidden" id="repiterId" name="id" value="">
			   @lang('users.modal-body12')
            </div><!-- /.modal-body -->
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
              <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
            </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-add-subscription">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-info">
              <h4 class="modal-title">@lang('users.add-subscription')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-add-subscription" action="{{ route('talkgroups.addSubscription') }}" method="POST">
                @csrf
              <div class="modal-body">
			  @lang('users.modal-body13')
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-disable-subscription">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('users.disable-subscription')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-disable-subscription" action="{{ route('talkgroups.disSubscription') }}" method="POST">
                @csrf
              <div class="modal-body">
			  @lang('users.modal-body14')
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-enable-subscription">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">@lang('users.enable-subscription')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-enable-subscription" action="{{ route('talkgroups.enableSubscription') }}" method="POST">
                @csrf
              <div class="modal-body">
			  @lang('users.modal-body15')
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-delete-subscription">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('users.delete-subscription')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-delete-subscription" action="{{ route('talkgroups.delSubscription') }}" method="POST">
                @csrf
              <div class="modal-body">
			  @lang('users.modal-body16')
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('users.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('users.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </section><!-- /.content -->
@endsection
@section('script')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
      $(function () {
        $('.select2').select2()
      });
  </script>
  <script>
    $(document).ready(function() {
        // Обработчик события клика по кнопке "Add"
        $('.btn-info').click(function() {
            // Получение данных из атрибутов кнопки
            var userId = $(this).data('user-id');
            var accountId = $(this).data('account-id');

            // Установка значений в скрытые поля в модальном окне
            $('#modalUserId').val(userId);
            $('#modalAccountId').val(accountId);
        });
        //add-repiter
        $('.add-repiter').click(function() {
            var repiterId = $(this).data('repiter-id');
            var modal = $(this).data('target');
            $(modal).find('#repiterId').val(repiterId);
        });
        //btn-enable-rid
        $('.btn-enable-rid').click(function() {
            var repiterId = $(this).data('repiter-id');
            var modal = $(this).data('target');
            $(modal).find('#repiterId').val(repiterId);
        });
        //btn-disable-rid
        $('.btn-disable-rid').click(function() {
            var repiterId = $(this).data('repiter-id');
            var modal = $(this).data('target');
            $(modal).find('#repiterId').val(repiterId);
        });
        //del-pid
        $('.del-pid').click(function() {
            var accountId = $(this).data('account-id');
            var modal = $(this).data('target');
            $(modal).find('#modalAccountId').val(accountId);
        });
        //btn-del-rid
        $('.btn-del-rid').click(function() {
            var repiterId = $(this).data('repiter-id');
            var modal = $(this).data('target');
            //add attribut action to form
            $(modal).find('form').attr('action', '/information-repeaters/' + repiterId);
        });
        //delete-pass
        $('.delete-pass').click(function() {
            var passwordId = $(this).data('password-id');
            var passwordKind = $(this).data('password-kind');
            var modal = $(this).data('target');
            $(modal).find('#modalPasswordId').val(passwordId);
            $(modal).find('#modalPasswordKind').val(passwordKind);
        });
        // select group by department

            $('.groups').select2();

         // Сохраняем исходный список групп для последующего использования
                var originalGroups = $('.groups option').clone();

            // Обработчик изменения выбора департамента
            $('.departments').change(function() {
                var selectedDepartment = $(this).val();

                // Очищаем текущий список групп
                $('.groups').empty();

                // Добавляем в список только те группы, которые соответствуют выбранному департаменту
                originalGroups.each(function() {
                    var $option = $(this);
                    if ($option.data('department') == selectedDepartment) { // Убедитесь в использовании двойного равно для сравнения, если типы могут отличаться
                        $('.groups').append($option.clone()); // Добавляем подходящие опции
                    }
                });

                // Переинициализируем Select2 для списка групп, чтобы отобразить обновления
                $('.groups').select2();
            });

            // Инициируем событие изменения для департаментов, чтобы сразу фильтровать группы при загрузке страницы
            $('.departments').change();

            //add-subscr
           $(".add-subscr").click(function() {
        // Получаем значения выбранных опций
            var groupId = $("#group_id").val();
            var accountId = $("#account_id").val();
            var Option = 'E';
            // Создаем скрытые поля для формы
            var groupInput = $("<input>").attr("type", "hidden").attr("name", "Group").val(groupId);
            var accountInput = $("<input>").attr("type", "hidden").attr("name", "ID").val(accountId);
            var optionInput = $("<input>").attr("type", "hidden").attr("name", "Option").val(Option);

            // Добавляем скрытые поля в форму
            $("#quickForm-add-subscription").append(groupInput, accountInput, optionInput);
        });
        //dis-subscr
        $(".dis-subscr").click(function() {
            var number = $(this).data('subscription-number');
            var modal = $(this).data('target');
            $(modal).find('form').append('<input type="hidden" name="number" value="'+number+'">');
        });
        //enable-subscr
        $(".enable-subscr").click(function() {
            var number = $(this).data('subscription-number');
            var modal = $(this).data('target');
            $(modal).find('form').append('<input type="hidden" name="number" value="'+number+'">');
        });
        //delete-subscr
        $(".delete-subscr").click(function() {
            var number = $(this).data('subscription-number');
            var modal = $(this).data('target');
            $(modal).find('form').append('<input type="hidden" name="number" value="'+number+'">');
        });

        $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop(); // Извлекаем имя файла
        $(this).next('.custom-file-label').addClass("selected").html(fileName); // Обновляем метку
    });
    });
    </script>
    <script>
        $(document).ready(function(){
            $("#search1").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table.table-logs tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            //search2
            $("#search2").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("table.table_mail tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        </script>

    <script src="{{ asset('dist/js/setting_users/edit_accounts.js') }}"></script>
@endsection
