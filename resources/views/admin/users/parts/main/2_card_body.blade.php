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
{{--                    @include('components.select-department')--}}
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
