<div class="modal fade" id="modal-add1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="{{ route('admin.users.store') }}" method="POST" autocomplete="off">
                @csrf
                <div class="modal-header bg-success">
                    <h4 class="modal-title">Додати користувача</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="inputCallsign" class="col-sm-2 col-form-label">@lang('users.callsign')</label>--}}
                    {{--                        <div class="col-sm-10">--}}
                    {{--                            <input type="text" class="form-control" id="inputName" name="callsign" placeholder="@lang('users.callsign')">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Логін</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputName" name="name" value="{{ old('name') }}" placeholder="Логін" required>
                        </div>
                    </div>
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="" class="col-sm-2 col-form-label">@lang('users.department')</label>--}}
                    {{--                        <div class="col-sm-10">--}}
                    {{--                            <select class="form-control select2" style="width: 100%;" name="department_id">--}}
                    {{--                                @foreach ($departments as $department)--}}
                    {{--                                    <option value="{{ $department->id }}">{{ $department->id }} - {{ $department->name }}</option>--}}
                    {{--                                @endforeach--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="form-group row">
                        <label for="inpEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="inpEmail" name="email" value="{{ old("email") ?? '@' }}" placeholder="Email" required>
                        </div>
                    </div>
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="inputEmail" class="col-sm-2 col-form-label">@lang('users.language')</label>--}}
                    {{--                        <div class="col-sm-10">--}}
                    {{--                            <select class="form-control select2" style="width: 100%;" name="language">--}}
                    {{--                                <option value="en">English</option>--}}
                    {{--                                <option value="ru">Russian</option>--}}
                    {{--                                <option value="uz">Uzbek</option>--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Пароль</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Пароль" required autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Підтвердження пароля</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Підтвердження пароля" required autocomplete="off">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputFIO" class="col-sm-2 col-form-label">ФІО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputFIO" name="fio" value="{{ old('fio') }}" placeholder="ФІО" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPhone" class="col-sm-2 col-form-label">Телефон</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPhone" name="phone" value="{{ old('phone') }}" placeholder="Телефон" required>
                        </div>
                    </div>
                    <!-- Роли -->
                    @if(Gate::allows('edit-roles'))
                        <div class="form-group row">
                            <label for="roles" class="col-sm-2 col-form-label">Ролі</label>
                            <div class="col-sm-10">
                                <select id="roles" name="roles[]" class="form-control" multiple>
                                    @foreach($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <div class="form-group row">
                        <label for="inputNotes" class="col-sm-2 col-form-label">Нотатки</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="inputNotes" placeholder="Нотатки" name="notes"></textarea>
                        </div>
                    </div>
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="inputAdditionalInfo" class="col-sm-2 col-form-label">Додаткова інформація</label>--}}
                    {{--                        <div class="col-sm-10">--}}
                    {{--                            <textarea class="form-control" id="inputAdditionalInfo" placeholder="Додаткова інформація" name="additional_info"></textarea>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="form-group row">--}}
                    {{--                        <label for="" class="col-sm-2 col-form-label">@lang('users.status')</label>--}}
                    {{--                        <div class="col-sm-10">--}}
                    {{--                            <select class="form-control select2" style="width: 100%;" name="Active">--}}
                    {{--                                <option value="1">@lang('users.actived')</option>--}}
                    {{--                                <option value="0">@lang('users.deactived')</option>--}}
                    {{--                            </select>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                </div><!-- /.modal-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Відмінити</button>
                    <button type="submit" class="btn btn-primary">Створити</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function() {
        $(this).find("input, select").each(function() {
            $(this).val("");
        });
        $("#modal-add1").on("hidden.bs.modal", function() {
            $(this).find("form").trigger("reset");
            $("#inputName").val("");
            $("#inpEmail").val("");
            $("#inputPassword").val("");
            $("#password_confirmation").val("");
            $("#roles").val([]).trigger("change");
        });
    });

</script>