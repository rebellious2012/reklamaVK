<div class="modal fade" id="modal-banned" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-orange">
                <h4 class="modal-title">Ban User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <form id="quickForm-banned">
                @csrf
                <div class="modal-body">
                    <p>Are you sure you want to Banned the selected User?</p>
                    <p>Attention!!! Banned a User will result in the loss of some system capabilities.</p>
                    <div class="form-group row">
                        <label for="bannedID" class="col-sm-2 col-form-label">ID</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" id="bannedID" name="ID" style="width: 100%;" tabindex="0" aria-hidden="false">

                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="bannedGroupID" class="col-sm-2 col-form-label">TalkGroup</label>
                        <div class="col-sm-10">
                            <input type="number" name="Group" class="form-control" id="bannedGroupID" placeholder="TalkGroup ID">
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <label for="inputTime" class="col-sm-2 col-form-label">Block up to</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="Time" class="form-control" id="inputTime" placeholder="Blocked Time">
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="inputComment" class="col-sm-2 col-form-label">Comment</label>
                        <div class="col-sm-10">
                            <textarea name="Comment" class="form-control" id="inputComment" placeholder="Admin Notes"></textarea>
                        </div>
                    </div>
                </div><!-- /.modal-body -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="confirmBannedUser"  >Save Changes</button>
                </div>
            </form>


        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
