<div class="modal fade" id="modal-unbanned">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-olive">
                <h4 class="modal-title">Unban User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="quickForm-unbanned">
                @csrf
                <div class="modal-body">
                    <p>Are you sure you want to Unbanned the selected User?</p>
                    <p>Attention!!33! Unbanning the User will lead to the restoration of some system capabilities.</p>
                    <div class="form-group row">
                        <label for="inputID" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <select name="ID" class="form-control select25" id="inputID" style="width: 100%;">
                                <option>255012167</option>
                            </select>
                        </div>
                    </div>
                </div><!-- /.modal-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="confirmUnbanUser" >Save Changes</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
