<!-- small modal -->
<div class="modal fade modal-mini modal-primary" id="myModal10" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-big">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="material-icons">clear</i></button>
            </div>
            <div class="modal-body">
                <p style="text-align: center;">Are you sure you want to delete this?</p>
            </div>
            <div class="modal-footer justify-content-center">
                <form id="delete_modal" method="POST">
                    @method('DELETE') 
                    @csrf
                    <input type="hidden" name="" id="confirm_delete_id">
                    <button type="button" class="btn btn-link" data-dismiss="modal">Never mind</button>
                    <button type="submit" class="btn btn-success btn-link">Yes
                        <div class="ripple-container"></div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--    end small modal -->