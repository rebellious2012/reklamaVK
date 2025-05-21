<div class="modal fade" id="modal-delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="#" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-header bg-danger">
                    <h4 class="modal-title">Видалення Кроку</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Ви впевнені, що хочете видалити вибраний Крок?
                    <input type="hidden" name="stage_id" id="delete_stage_id">
                </div><!-- /.modal-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Відмінити</button>
                    <button type="submit" class="btn btn-primary">Видалити</button>
                </div>
            </form>
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
