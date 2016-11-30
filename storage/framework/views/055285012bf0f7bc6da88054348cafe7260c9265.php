<div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class=""><input style="position:absolute;background:transparent;width:240px;margin:-10px 0 0 0;border:none" type="text" class="id nama"> </h4>
        </div>
        <div class="modal-body">
            <div class="deleteContent">
            <p style="float:left">Data akan dihapus secara permanen.</p><br/>&nbsp
            <span class="hidden did"></span>
            <input type="hidden" class="page" name="page_delete">
            <input type="hidden" class="id" name="id_delete">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">
                    <span class='glyphicon glyphicon-remove' style="float:left;padding:3px 5px 0 0"></span><span style="float:left"> batal</span>
                </button>
                <button autofocus type="button" class="btn actiondelete btn-danger" data-dismiss="modal">
                    <span class='glyphicon glyphicon-trash' style="float:left;padding:3px 5px 0 0"></span><span style="float:left"> hapus</span>
                </button>
            </div>
        </div>
    </div>
</div>