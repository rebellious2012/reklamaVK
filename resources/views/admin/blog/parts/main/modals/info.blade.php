<div class="modal fade" id="modal-info">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title">Інформація про Користувача</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="quickForm-add" action="" method="POST">
                @csrf
                <div class="modal-body">
                    Інформація про Користувача
                    <div class="form-group row">
                        <label for="id" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" placeholder="ID" disabled="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fio" class="col-sm-2 col-form-label">ФІО</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fio" placeholder="ФІО" disabled="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="current" class="col-sm-2 col-form-label">Поточний етап</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="current" placeholder="Поточний етап" disabled="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="paymant" class="col-sm-2 col-form-label">Оплата</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="payment" placeholder="Оплата" disabled="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Телефон</label>
                        <div class="col-sm-10">
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон" disabled="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" class="form-control" id="email" placeholder="Email" disabled="">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="notes" class="col-sm-2 col-form-label">Нотатки</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" id="notes" placeholder="Нотатки" disabled=""></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-2 col-form-label">Статус</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" disabled="" id="status">
{{--                                <option value="1">ctived</option>--}}
{{--                                <option value="0">@lang('users.deactived')</option>--}}
                            </select>
                        </div>
                    </div>
                </div><!-- /.modal-body -->
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
