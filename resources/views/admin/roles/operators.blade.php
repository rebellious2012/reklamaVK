@extends('layouts.app')
@section('title', 'Settings | Operators')
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
            <h1>@lang('operators.operators')</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">@lang('operators.home')</a></li>
              <li class="breadcrumb-item active">@lang('operators.operators')</li>
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
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user-crown"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">@lang('operators.activated')</span>
                  <span class="info-box-number">
                    {{$act_count}}
                    <small>@lang('operators.pcs')</small>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-crown"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">@lang('operators.deactivated')</span>
                  <span class="info-box-number">
                    {{$deact_count}}
                    <small>@lang('operators.pcs')</small>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-12 col-sm-6 col-md-4">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user-crown"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">@lang('operators.total')</span>
                  <span class="info-box-number">
                    {{$op_count}}
                    <small>@lang('operators.pcs')</small>
                  </span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h3 class="card-title">@lang('operators.filter')</h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse">
                <i class="fas fa-minus"></i>
              </button>
            </div>
          </div><!-- /.card-header -->
          <div class="card-body">
            <div class="form-group">
              <label>@lang('operators.select-a-departments-to-analyze')</label>
             @include('components.select-department')
            </div><!-- /.form-group -->
          </div><!-- /.card-body -->
        </div><!-- /.card -->
          <div class="card card-warning card-outline">
            <div class="card-header">
              <h3 class="card-title">@lang('operators.actions')</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="card-body">
              <a class="btn btn-app bg-info btn-info" data-toggle="modal" data-target="#modal-info">
                <i class="fas fa-info-circle"></i> @lang('operators.info_action')
              </a>
              <a class="btn btn-app history">
                <span class="badge bg-info">200</span>
                <i class="fas fa-tasks"></i> @lang('operators.call_history')
              </a>
              <a class="btn btn-app" href="{{ route('call-control') }}">
                <i class="fas fa-head-side-headphones"></i> @lang('operators.call_control')
              </a>
              <a class="btn btn-app" href="{{ route('call-console') }}">
                <i class="fas fa-phone-volume"></i> @lang('operators.call-console')
              </a>
              <a class="btn btn-app rep-edit">
                <i class="fas fa-signal-stream"></i>@lang('operators.device')
              </a>
              @can('access-page','operators_add')
              <a class="btn btn-app bg-success" data-toggle="modal" data-target="#modal-add">
                <i class="fas fa-user-plus"></i> @lang('operators.add')
              </a>
              @endcan
              @can('access-page','operators_edit')
              <a class="btn btn-app bg-warning btn-edit" data-toggle="modal" data-target="#modal-edit">
                <i class="fas fa-user-edit"></i> @lang('operators.edit')
              </a>
                @endcan
              @can('access-page','operators_delete')
              <a class="btn btn-app bg-danger btn-del" data-toggle="modal" data-target="#modal-delete">
                <i class="fas fa-user-times"></i> @lang('operators.delete')
              </a>
              @endcan

            </div><!-- /.card-body -->
          </div><!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">@lang('operators.operator-list')</h3>
            </div><!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>@lang('operators.user-callsign')</th>
                  <th>@lang('operators.device-id')</th>
                  <th>@lang('operators.device-callsign')</th>
                  <th>@lang('operators.reed-dev-setting')</th>
                  <th>@lang('operators.edit-dev-setting')</th>
                  <th>@lang('operators.manage-dev-operators')</th>
                  <th>@lang('operators.activation')</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($operators as $operator)
                    <tr>
                        <td>
                          <div class="custom-control custom-radio">
                            <input class="custom-control-input" type="radio" id="customRadio{{ $operator->id }}" name="customRadio" value="{{ $operator->id }}">
                            <label for="customRadio{{ $operator->id }}" class="custom-control-label">{{ $operator->id }}</label>
                          </div>
                        </td>
                        <td>{{ $operator->user?->callsign}}</td>
                        <td>{{ $operator->device_id }}</td>
                        <td>{{ $operator->device?->Call }}</td>
                        <td><span class="badge
                            @if ($operator->read == false)
                                bg-secondary">Deactivated
                                @else
                                bg-success">Actived
                            @endif
                        </span></td>
                        <td><span class="badge
                            @if ($operator->write == false)
                                bg-secondary">Deactivated
                                @else
                                bg-success">Actived
                            @endif
                            </span></td>
                        <td><span class="badge @if ($operator->manage_sysops == false)
                            bg-secondary">Deactivated
                            @else
                            bg-success">Actived
                        @endif
                    </span></td>
                        <td><span class="badge @if ($operator->actions == false)
                            bg-secondary">Deactivated
                            @else
                            bg-success">Actived
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
              <h4 class="modal-title">@lang('operators.operator-info')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-add" >
              <div class="modal-body">
			  @lang('operators.modal-body')
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.department')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" disabled="">
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
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.operator')</label>
                  <div class="col-sm-9">
                    <select class="select2 users" style="width: 100%;" disabled="">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}"
                                >{{ $user->callsign }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.device')</label>
                  <div class="col-sm-9">
                    <select class="select2 repeaters" style="width: 100%;" disabled="" value="">
                        @foreach ($repeaters as $repeater)
                            <option value="{{ $repeater->ID }}">{{ $repeater->ID }} - {{ $repeater->Call }}</option>
                        @endforeach
                        @foreach ($hotspots as $hotspot)
                            <option value="{{ $hotspot->ID }}">{{ $hotspot->ID }} - {{ $hotspot->Call }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.reed-rpt-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 read" style="width: 100%;" disabled="">
                      <option value="1">@lang('operators.actived')</option>
                      <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.edit-rpt-settngs')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 edit" style="width: 100%;" disabled="">
                      <option value="1">@lang('operators.actived')</option>
                      <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.manage-rpt-operators')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 manage_sysops" style="width: 100%;" disabled="">
                      <option value="1">@lang('operators.actived')</option>
                      <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.activation')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 active" style="width: 100%;" disabled="">
                      <option value="1">@lang('operators.enabled')</option>
                      <option value="0">@lang('operators.disabled')</option>
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
            <div class="modal-header bg-success">
              <h4 class="modal-title">@lang('operators.add-operator')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-add" action="{{ route('operators.store') }}" method="POST">
                @csrf
              <div class="modal-body">
			  @lang('operators.modal-body2')
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.department')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="department_id" id="department_id">
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
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.user')</label>
                  <div class="col-sm-9">
                    <select class="select2 users" data-placeholder="@lang('operators.user-choice')" style="width: 100%;" multiple="multiple" name="user_id[]">
                        {{-- @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->callsign }}</option>
                        @endforeach --}}
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.device')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 device" style="width: 100%;" data-placeholder="@lang('operators.device-choice')" name="device_id">
                      {{-- @foreach ($repeaters as $repeater)
                        <option value="{{ $repeater->ID }}">{{ $repeater->ID }} - {{ $repeater->Call }}</option>
                      @endforeach
                        @foreach ($hotspots as $hotspot)
                            <option value="{{ $hotspot->ID }}">{{ $hotspot->ID }} - {{ $hotspot->Call }}</option>
                        @endforeach --}}

                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.reed-dev-settings')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="read" disabled="">
                      <option value="1">@lang('operators.actived')</option>
                      <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.edit-dev-settings')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="write">
                      <option value="1">@lang('operators.actived')</option>
                      <option value="0" selected>@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.manage-dev-operators')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" name="manage_sysops">
                      <option value="1">@lang('operators.actived')</option>
                      <option value="0" selected>@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                {{-- <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">@lang('operators.activation')</label>
                    <div class="col-sm-9">
                      <select class="form-control select2" style="width: 100%;" name="actions">
                        <option value="1">@lang('operators.enabled')</option>
                        <option value="0">@lang('operators.disabled')</option>
                      </select>
                    </div>
                  </div> --}}
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('operators.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('operators.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-edit">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-warning">
              <h4 class="modal-title">@lang('operators.edit-operator')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-edit" action="#" method="POST">
                @csrf
                @method('PUT')
              <div class="modal-body">
			  @lang('operators.modal-body3')
                {{-- <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.department')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2" style="width: 100%;" disabled="">
                        @foreach ($departments as $department)
                            <option value="{{ $department->id }}"
                                @if ($department->id == $selected_dep)
                                    selected
                                @endif
                                >{{ $department->id }} - {{ $department->name }}</option>
                        @endforeach
                    </select>
                  </div>
                </div> --}}
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.user')</label>
                  <div class="col-sm-9">
                    <select class="select2 users" style="width: 100%;" disabled="">
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{ $user->callsign }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.device')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 repeaters" style="width: 100%;" disabled="">
                        @foreach ($repeaters as $repeater)
                            <option value="{{ $repeater->ID }}">{{ $repeater->ID }} - {{ $repeater->Call }}</option>
                        @endforeach
                        @foreach ($hotspots as $hotspot)
                            <option value="{{ $hotspot->ID }}">{{ $hotspot->ID }} - {{ $hotspot->Call }}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.reed-dev-settings')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 read" style="width: 100%;" name="read">
                        <option value="1">@lang('operators.actived')</option>
                        <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.edit-dev-settings')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 write" style="width: 100%;" name="write">
                        <option value="1">@lang('operators.actived')</option>
                        <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.manage-dev-operators')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 manage_sysops" style="width: 100%;" name="manage_sysops">
                        <option value="1">@lang('operators.actived')</option>
                        <option value="0">@lang('operators.deactived')</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">@lang('operators.activation')</label>
                  <div class="col-sm-9">
                    <select class="form-control select2 actions" style="width: 100%;" name="actions">
                      <option value="1">@lang('operators.enabled')</option>
                      <option value="0">@lang('operators.disabled')</option>
                    </select>
                  </div>
                </div>
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('operators.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('operators.save-changes')</button>
              </div>
            </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      <div class="modal fade" id="modal-delete">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header bg-danger">
              <h4 class="modal-title">@lang('operators.delete-operator')</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form id="quickForm-delete" action="#" method="POST">
                @csrf
                @method('DELETE')
              <div class="modal-body">
			  @lang('operators.modal-body4')
              </div><!-- /.modal-body -->
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang('operators.cancel')</button>
                <button type="submit" class="btn btn-primary">@lang('operators.save-changes')</button>
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
</script>
<script>
    //btn-info
    $('.btn-info').on('click', function() {
        var id = $('input[name="customRadio"]:checked').val();
        if(!id){
            alert(select_row);
            return false;
        }
        $.ajax({
            url: '/operators/' + id,
            type: 'GET',
            success: function(data) {
                var modal = $('#modal-info');
                modal.find('.users').val(data.user_id).trigger('change');
                modal.find('.repeaters').val(data.device_id).trigger('change');
                modal.find('.read').val(data.read).trigger('change');
                modal.find('.edit').val(data.write).trigger('change');
                modal.find('.manage_sysops').val(data.manage_sysops).trigger('change');
                modal.find('.actions').val(data.actions).trigger('change');
            }
        });
    });
    //btn-edit
    $('.btn-edit').on('click', function() {
        var id = $('input[name="customRadio"]:checked').val();
        if(!id){
            alert(select_row);
            return false;
        }
        $.ajax({
            url: '/operators/' + id,
            type: 'GET',
            success: function(data) {
                var modal = $('#modal-edit');
                modal.find('.users').val(data.user_id).trigger('change');
                modal.find('.repeaters').val(data.device_id).trigger('change');
                modal.find('.read').val(data.read).trigger('change');
                modal.find('.edit').val(data.write).trigger('change');
                modal.find('.manage_sysops').val(data.manage_sysops).trigger('change');
                modal.find('.actions').val(data.actions).trigger('change');
                modal.find('form').attr('action', '/operators/' + id);
            }
        });
    });
    //btn-del
    $('.btn-del').on('click', function() {
        var id = $('input[name="customRadio"]:checked').val();
        if(!id){
            alert(select_row);
            return false;
        }
        $('#quickForm-delete').attr('action', '/operators/' + id);
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
// information-repeaters-edit
$('.rep-edit').click(function() {
    //get repeater id from 3 td in tr
    var repeater = $('input[name="customRadio"]:checked').closest('tr').find('td:eq(2)').text();
    if (repeater) {
        // chek num symbol in repeater
        if (repeater.length == 6) {
            $(this).attr('href', 'information-repeaters/' + repeater + '/edit');
        } else {
            $(this).attr('href', 'hotspots/' + repeater + '/edit');
        }
    } else {
        $(this).removeAttr('href');
    }
});
$(document).ready(function() {
    var allUsers = @json($users->values());
    var allRepeaters = @json($repeaters);
    var allHotspots = @json($hotspots);
    function updateSelections(department) {
        var users = allUsers.filter(user => user.department_id == department);
        var repeaters = allRepeaters.filter(repeater => repeater.department_id == department);
        var hotspots = allHotspots.filter(hotspot => hotspot.department_id == department);
        var usersSelect = $('.users');
        var repeatersSelect = $('.device');
        var usersOptions = '';
        var repeatersOptions = '';
        var hotspotsOptions = '';
        usersSelect.empty();
        repeatersSelect.empty();
        users.forEach(user => {
            usersOptions += `<option value="${user.id}">${user.callsign}</option>`;
        });
        repeaters.forEach(repeater => {
            repeatersOptions += `<option value="${repeater.ID}">${repeater.ID} - ${repeater.Call}</option>`;
        });
        hotspots.forEach(hotspot => {
            hotspotsOptions += `<option value="${hotspot.ID}">${hotspot.ID} - ${hotspot.Call}</option>`;
        });
        usersSelect.append(usersOptions);
        repeatersSelect.append(repeatersOptions);
        repeatersSelect.append(hotspotsOptions);
    }
    $('#department_id').on('change', function() {
        var department = $(this).val();
        updateSelections(department);
    });
    updateSelections($('#department_id').val());
});

</script>
@endsection
