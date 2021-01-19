<!-- Modal -->
<div class="modal fade" id="modalPenulis" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="store-update" action="" method="post">
                    <div class="form-group">
                        <label>Nama Penulis : </label>
                        <input type="text" class="form-control name" placeholder="Nama Penulis ..." name="name">
                    </div>

                    <div class="form-group d-flex justify-content-end mt-4 mb-1">
                        <button type="button" class="btn btn-secondary mr-2" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                    @csrf
                </form>
            </div>
            <div class="modal-footer d-flex justify-content-start">
                <small class="text-primary"> Silahkan tekan save jika anda sudah yakin </small>
            </div>
        </div>
    </div>
</div>
