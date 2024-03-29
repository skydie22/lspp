{{-- modal --}}
<div class="modal fade" id="tambah-kategori" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.kategori.create') }}" method="post">
            @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kode</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="kode" value="{{ $code }}" required>
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Nama</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="nama" required>
             </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </form>
      </div>
    </div>
  </div>
