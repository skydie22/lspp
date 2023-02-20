@foreach ($anggota as $a)

<div class="modal fade" id="update-anggota{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.anggota.update' , $a->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">kode</label>
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">nis</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="nis" required value="{{ $a->kode }}">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">fullname</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="fullname" required value="{{ $a->fullname }}">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">username</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="username" required value="{{ $a->username }}">
                </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">kelas</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="kelas" required value="{{ $a->kelas }}">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">alamat</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="alamat" required value="{{ $a->alamat }}">
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">status</label>
                <select name="verif_id"  class="form-select" >
                    <option value="" disabled selected>-- pilih opsion</option>
                    <option value="verified">verified</option>
                    <option value="unverified">unverified</option>
                </select>
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

@endforeach
