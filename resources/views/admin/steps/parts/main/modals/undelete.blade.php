<div class="modal fade" id="modal-undelete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="" method="POST">
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
