<div class="modal fade" id="tambah-pemberitahuan" tabindex="-1" role="dialog" aria-labelledby="storeModalTitle"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="storeModalTitle">
                Buat Pemberitahuan
            </h5>
            <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                <i data-feather="x"></i>
            </button>
        </div>
        <form action="{{ route('admin.pemberitahuan.store') }}" method="POST" class="form-group">
            @csrf
            <div class="modal-body">
                <div class="card-body">
                    <div class="mb-3">
                        <textarea style="height: 100px" placeholder="Isi Pemberitahuan" type="text" name="isi" class="form-control" required></textarea>
                    </div>
                    <div class="d-flex justify-content-center">
                        <div class="btn-group" role="group"
                            aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" value="aktif" name="status"
                                id="btnradio1" autocomplete="off" checked>
                            <label class="btn btn-outline-primary" for="btnradio1">General</label>

                            <input type="radio" class="btn-check" value="admin" name="status"
                                id="btnradio2" autocomplete="off">
                            <label class="btn btn-outline-light" for="btnradio2">Only Admin</label>

                            <input type="radio" class="btn-check" value="user" name="status"
                                id="btnradio3" autocomplete="off">
                            <label class="btn btn-outline-success" for="btnradio3">Only User</label>
                        </div>
                    </div>
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Submit</span>
                </button>
            </div>
        </form>
    </div>
</div>
</div>
