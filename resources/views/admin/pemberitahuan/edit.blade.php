@foreach ($pemberitahuan as $p)
    <div class="modal fade" id="update-pemberitahuan{{ $p->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.pemberitahuan.update', $p->id) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="card-body">
                                <div class="mb-3">
                                    <textarea style="height: 100px" placeholder="Isi Pemberitahuan" type="text" name="isi" class="form-control" required>{{ $p->isi }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="formGroupExampleInput" class="form-label">Status</label>
                                    <select name="status"  class="form-select" >
                                        <option value="" disabled selected>--Pilih Opsi--</option>
                                        <option value="aktif" >Aktif</option>
                                        <option value="nonaktif" >Nonaktif</option>
                                    </select>

                                </div>
                            </div>
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
