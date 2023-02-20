@extends('layouts.master')
@section('content')
<div class="mb-3">
    <center>
        <h3>Identitas Aplikasi</h3>
    </center>
</div>
<div class="mb-3">
  <center>
    <img src="/img/identitas/{{ $identitas->foto }}" class="rounded-circle" style="width: 150px;"
      alt="Avatar" />

  </center>

</div>

    <div class="col-md-12 col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">Edit Identitas Aplikasi</h4>
      </div>
      <div class="card-content">
        <div class="card-body">
        <form class="form form-vertical" action="{{ route('admin.identitas.update')  }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="form-body">
              <div class="row">

                <div class="col-12">
                    <div class="form-group">
                      <label>Foto</label>
                      <input
                        type="file"
                        class="form-control"
                        name="foto"
                        />
                    </div>
                  </div>

                <div class="col-12">
                  <div class="form-group">
                    <label
                      >Nama Aplikasi</label
                    >
                    <input
                      type="text"
                      class="form-control"
                      name="nama_app"
                      value="{{ $identitas->nama_app }}"

                    />
                  </div>
                </div>



                  <div class="col-12">
                    <div class="form-group">
                        <label
                        for="exampleFormControlTextarea1"
                        class="form-label"
                        > Alamat Lengkap</label
                      >
                      <textarea
                        class="form-control"
                        name="alamat_app"
                        id="exampleFormControlTextarea1"
                        rows="3"
                      >{{ $identitas->alamat_app }}</textarea>
                      {{-- <input
                        type="text"
                        class="form-control"
                        name="username"
                        value="{{ Auth::user()->alamat }}"
                      /> --}}
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label
                        >Email</label
                      >
                      <input
                        type="email"
                        class="form-control"
                        name="email_app"
                        value="{{ $identitas->email_app }}"

                      />
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="form-group">
                      <label
                        >No Telepon</label
                      >
                      <input
                        type="number"
                        class="form-control"
                        name="nomor_hp"
                        value="{{ $identitas->nomor_hp }}"

                      />
                    </div>
                  </div>


                <div class="col-12 d-flex justify-content-start">
                  <button
                    type="submit"
                    class="btn btn-primary me-1 mb-1"
                  >
                    Submit
                  </button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
