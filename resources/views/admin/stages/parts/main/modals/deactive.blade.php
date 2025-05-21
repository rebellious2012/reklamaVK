<div class="modal fade" id="modal-deactive">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">@lang('users.user-deactivation')</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="quickForm-deactivate" action="" method="POST">
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
