@foreach ($buku as $b)
<div class="modal fade" id="update-buku{{ $b->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
    <form action="{{ route('admin.buku.update', $b->id) }}" method="post">
            @csrf
            @method('put')
        <div class="modal-body">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Judul Buku</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="judul" value="{{ $b->judul  }}" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Kategori</label>
                <select name="kategori_id" id="" class="form-select">


                    @foreach ($kategori as $k)
                    <option value="{{ $k->id }}" {{ $k->id === $b->kategori_id ? 'selected' : '' }}>{{ $k->nama }}</option>
                @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Penerbit</label>
                <select name="penerbit_id" id="" class="form-select">


                    @foreach ($penerbit as $k)
                    <option value="{{ $k->id }}">{{ $k->nama }}</option>
                @endforeach

                </select>
            </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Pengarang</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="pengarang"  value="{{ $b->pengarang }}" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="tahun_terbit"   value="{{ $b->tahun_terbit }}"  required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Isbn</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="isbn" value="{{ $b->isbn }}" required >
             </div>

            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">jumlah buku baik</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="j_buku_baik"  value="{{ $b->j_buku_baik }}" required >
             </div>

             <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">jumlah buku rusak</label>
                <input type="number" class="form-control" id="formGroupExampleInput" placeholder="" name="j_buku_rusak" value="{{ $b->j_buku_rusak }}" required >
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

