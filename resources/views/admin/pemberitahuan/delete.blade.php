@foreach ($pemberitahuan as $p)
<div class="modal fade modal-borderless" id="hapus-pemberitahuan{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action={{route('admin.pemberitahuan.delete', $p->id)}} method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <center class="mt-3">
                        <p>
                            apakah anda yakin ingin menghapus data ini?
                        </p>

                    </center>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Hapus!</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endforeach
