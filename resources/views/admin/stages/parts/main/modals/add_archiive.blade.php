<div class="modal fade" id="modal-add">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
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
{{--                                @foreach ($departments as $department)--}}
{{--                                    <option value="{{ $department->id }}">{{ $department->id }} - {{ $department->name }}</option>--}}
{{--                                @endforeach--}}
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