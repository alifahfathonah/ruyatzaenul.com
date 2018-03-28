<div class="modal fade" id="modal-confirm" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title-confirm"></h4>
            </div>
            <div class="modal-body">
              <center>
                <div id="modal-loader-confirm" style="text-align: center;display: none;">
                    <img src="{{asset('images/logo/loading-bl-blue.gif')}}" alt="" class="loading">
                </div>
              </center>
                <div id="dynamic-content-confirm"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline btn-xs" id="closebutton" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs" id="confirmbutton">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div class="modal fade" id="modal-hapus" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title-hapus">Peringatan</h4>
            </div>
            <div class="modal-body">
                <h1 class="text-danger">Yakin Ingin Menghapus Data Ini ?</h1>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline btn-xs" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success btn-xs" id="hapusbutton">OK</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
