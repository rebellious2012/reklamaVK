@extends('layouts.app')
@section('title', 'Settings | Administrators')
@section('style')
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
 @endsection
@section('content')
    <section class="content-header">
      <div class="container-fluid">
        <!-- general form elements -->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>@lang('administrators.administrators')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('menu.home')</a></li>
              <li class="breadcrumb-item active">@lang('administrators.administrators')</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @include('layouts.alerts')
         <!-- Info boxes -->
         <div class="row">
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-graduate"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">@lang('administrators.activated')</span>
                  <span class="info-box-number">
                    {{ $act_count }}
                    <small>@lang('administrators.pcs')</small>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-graduate"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">@lang('administrators.deactivated')</span>
                  <span class="info-box-number">
                    {{ $deact_count }}
                    <small>@lang('administrators.pcs')</small>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-graduate"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">@lang('administrators.total')</span>
                  <span class="info-box-number">
                    {{ $adm_count }}
                    <small>@lang('administrators.pcs')</small>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">@lang('administrators.filter')</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label>@lang('administrators.select-a-department-to-analyze')</label>
             @include('components.select-department')
            </div><!-- /.form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card card-warning card-outline">
          <div class="card-header">
            <h3 class="card-title">@lang('administrators.actions')</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <a class="btn btn-app bg-info btn-info" data-toggle="modal" data-target="#modal-info">
              <i class="fas fa-info-circle"></i> @lang('administrators.info_action')
            </a>
            <a class="btn btn-app history" >
              <span class="badge bg-info">200</span>
              <i class="fas fa-tasks"></i> @lang('administrators.call_history')
            </a>
            <a class="btn btn-app" href="{{ route('call-control') }}">
              <i class="fas fa-head-side-headphones"></i> @lang('administrators.call_control')
            </a>
            <a class="btn btn-app" href="{{ route('call-console') }}">
              <i class="fas fa-phone-volume"></i> @lang('administrators.call-console')
            </a>
            @can('access-department', [0, 'add_department'])
            <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-add">
                <i class="fas fa-user-plus"></i> @lang('administrators.add')
              </a>
              <a class="btn btn-app bg-warning btn-edit" data-toggle="modal" data-target="#modal-edit">
                <i class="fas fa-user-edit"></i> @lang('administrators.edit')
              </a>
              <a class="btn btn-app bg-danger btn-del" data-toggle="modal" data-target="#modal-delete">
                <i class="fas fa-user-times"></i> @lang('administrators.delete')
              </a>
            @endcan

          </div><!-- /.card-body -->
        </div><!-- /.card -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">@lang('administrators.administrator-list')</h3>
          </div><!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>#</th>
                <th>@lang('administrators.dep')</th>
                <th>@lang('administrators.user-callsign')</th>
                <th>@lang('administrators.reed-dep-settings')</th>
                <th>@lang('administrators.edit-dep-settings')</th>
                <th>@lang('administrators.manage-dep-operators')</th>
                <th>@lang('administrators.sys-administrator')</th>
                <th>@lang('administrators.activation')</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($administrators as $administrator)
                <tr>
                    <td>
                      <div class="custom-control custom-radio">
                        <input class="custom-control-input" type="radio" id="customRadio{{ $administrator->id }}" name="customRadio" value="{{ $administrator->id }}">
                        <label for="customRadio{{ $administrator->id }}" class="custom-control-label">{{ $administrator->id }}</label>
                      </div>
                    </td>
                    <td>{{ $administrator->department_id }}</td>
                    <td>{{ $administrator->user->callsign }}</td>
                    <td><span class="badge
                        @if($administrator->read == 2)
                        bg-success">@lang('administrators.actived-all')
                        @elseif($administrator->read == 1)
                            bg-warning">@lang('administrators.actived-only-home')
                        @else
                            bg-secondary">Deactivated
                        @endif
                        </span></td>
                    <td><span class="badge
                        @if($administrator->edit == 2)
                        bg-success">@lang('administrators.actived-all')
                        @elseif($administrator->edit == 1)
                            bg-warning">@lang('administrators.actived-only-home')
                        @else
                            bg-secondary">Deactivated
                        @endif
                        </span></td>
                    <td><span class="badge
                        @if($administrator->manage == 2)
                        bg-success">@lang('administrators.actived-all')
                        @elseif($administrator->manage == 1)
                            bg-warning">@lang('administrators.actived-only-home')
                        @else
                            bg-secondary">Deactivated
                        @endif
                        </span></td>
                    <td><span class="badge
                        @if ($administrator->addition == 1)
                            bg-success">@lang('administrators.actived')
                        @else
                            bg-secondary">Deactivated
                        @endif
                        </span></td>
                    <td><span class="badge
                        @if ($administrator->active == 1)
                        bg-success">Enabled
                        @else
                        bg-secondary">Disabled
                        @endif
                        </span></td>
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
              <h4 class="modal-title">@lang('administrators.administrator-info')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>

              <div class="modal-body">
			  @lang('administrators.modal-body')
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.department')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" disabled="" name="department_id">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->id }} - {{ $department->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.operator')</label>
                  <div class="col-sm-9">
                    <select class="select2" style="width: 100%;" disabled="" name="user_id">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->callsign }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.reed-dep-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 read" style="width: 100%;" disabled="">
                      <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.edit-dep-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 edit" style="width: 100%;" disabled="">
                      <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.manage-dep-operators')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 manage" style="width: 100%;" disabled="">
                      <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.add-departments')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 addition" style="width: 100%;" disabled="">
                      <option value="1">@lang('administrators.actived')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.activation')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 active" style="width: 100%;" disabled="">
                      <option value="1">@lang('administrators.enabled')</option>
                      <option value="0">@lang('administrators.disabled')</option>
                    </select>
                  </div>
                </div>
              </div><!-- /.modal-body -->

          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-add">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-success">
              <h4 class="modal-title">@lang('administrators.add-administrator')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="{{ route('administrators.store') }}" method="POST">
                @csrf
              <div class="modal-body">
			  @lang('administrators.modal-body2')
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.department')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="department_id" id="departments">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                @if ($department->id == $selected_dep)
                        selected
                        @endif
                                >{{ $department->id }} - {{ $department->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.user')</label>
                  <div class="col-sm-9">
                    <select class="select2 users" multiple="multiple" data-placeholder="@lang('administrators.user-choice')" style="width: 100%;" name="user_id[]">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->callsign }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.reed-dep-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="read">
                      <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.edit-dep-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="edit">
                      <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.manage-dep-operators')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="manage">
                      <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>

                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.add-departments')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="addition">
                      <option value="1">@lang('administrators.actived')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('administrators.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('administrators.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">@lang('administrators.edit-administrator')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-edit" action="#" method="POST">
                @csrf
                @method('PUT')
              <div class="modal-body">
			  @lang('administrators.modal-body3')
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.department')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 department_id" style="width: 100%;" disabled="">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}">{{ $department->id }} - {{ $department->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.user')</label>
                  <div class="col-sm-9">
                    <select class="select2 users" style="width: 100%;" disabled="">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->callsign }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.reed-dep-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="read">
                       <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.edit-dep-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="edit">
                       <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.manage-dep-operators')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="manage">
                       <option value="1">@lang('administrators.actived-only-home')</option>
                      <option value="2">@lang('administrators.actived-all')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.add-departments')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="addition">
                      <option value="1">@lang('administrators.actived')</option>
                      <option value="0">@lang('administrators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('administrators.activation')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="active">
                        <option value="1">@lang('administrators.enabled')</option>
                        <option value="0">@lang('administrators.disabled')</option>
                    </select>
                  </div>
                </div>
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('administrators.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('administrators.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('administrators.delete-administrator')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-delete" action="#" method="POST">
                @csrf
                @method('DELETE')
              <div class="modal-body">
			  @lang('administrators.modal-body4')
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('administrators.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('administrators.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </section><!-- /.content -->
@endsection
@section('script')
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
  });
</script>
<script>
    var select_row = '{{__('administrators.please_select_a_row')}}';
</script>
<script>
    $(function () {
      $('.select2').select2()
    });
    $('.departments').on('select2:select', function(e) {
        var selectedValue = $(this).val();
        var newUrl = new URL(window.location.href);
        newUrl.searchParams.set('department', selectedValue);
        window.location.href = newUrl.href;
    });
    //click on departments ajax to get users and insert into select2 users
    $('#departments').on('change', function() {
        var id = $(this).val();
        var url = '/administrators/getUsersByDepartment';
        $.ajax({
            url: url,
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
                $('.users').empty();
                $.each(data, function(index, user) {
                    $('.users').append('<option value="' + user.id + '">' + user.callsign + '</option>');
                });
            }
        });
    });
    //btn-info click ajax to get data and insert into modal-info
$('.btn-info').on('click', function() {
        var id = $('input[name="customRadio"]:checked').val();
        var url = '/administrators/' + id;
        if (!id) {
            alert(select_row);
            return false;
        }
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                var modal = $('#modal-info');
                modal.find('select[name="department_id"]').val(data.department_id).trigger('change');
                modal.find('select[name="user_id"]').val(data.user_id).trigger('change');
                modal.find('.read').val(data.read).trigger('change');
                modal.find('.edit').val(data.edit).trigger('change');
                modal.find('.manage').val(data.manage).trigger('change');
                modal.find('.dispatching').val(data.dispatching).trigger('change');
                modal.find('.addition').val(data.addition).trigger('change');
                modal.find('.active').val(data.active).trigger('change');
            }
        });
    });
    //btn-edit click ajax to get data and insert into modal-edit
$('.btn-edit').on('click', function() {
        var id = $('input[name="customRadio"]:checked').val();
        var url = '/administrators/' + id;
        if (!id) {
            alert(select_row);
            return false;
        }
        $.ajax({
            url: url,
            type: 'GET',
            success: function(data) {
                var modal = $('#modal-edit');
                modal.find('.department_id').val(data.department_id).trigger('change');
                modal.find('.users').val(data.user_id).trigger('change');
                modal.find('select[name="read"]').val(data.read).trigger('change');
                modal.find('select[name="edit"]').val(data.edit).trigger('change');
                modal.find('select[name="manage"]').val(data.manage).trigger('change');
                modal.find('select[name="dispatching"]').val(data.dispatching).trigger('change');
                modal.find('select[name="addition"]').val(data.addition).trigger('change');
                modal.find('select[name="active"]').val(data.active).trigger('change');
                // ADD action url administrators.update id
                modal.find('form').attr('action', '/administrators/' + id);
            }
        });
    });
//btn-del
$('.btn-del').on('click', function() {
        var id = $('input[name="customRadio"]:checked').val();
        var url = '/administrators/' + id;
        if (!id) {
            alert(select_row);
            return false;
        }
        $('#quickForm-delete').attr('action', url);
    });
       //history
$('.history').click(function() {
    //get user callsign from 3 td in tr
    var callsign = $('input[name="customRadio"]:checked').closest('tr').find('td:eq(1)').text();
    if (callsign) {

        $(this).attr('href', 'call-last?users=' + callsign);
    } else {
        $(this).removeAttr('href');
    }
});
</script>
@endsection
