@foreach ($admin as $a)

<div class="modal fade" id="update-admin{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('admin.admin.update' , $a->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="modal-body">

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">fullname</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="fullname" required value="{{ $a->fullname }}">
                </div>

                <div class="mb-3">
                    <label for="formGroupExampleInput" class="form-label">username</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="" name="username" required value="{{ $a->username }}">
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
