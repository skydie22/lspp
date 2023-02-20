@extends('layouts.master')
@section('content')
<div class="mb-3">
    @foreach ($pemberitahuan as $p)
    <div class="alert alert-primary">

        <p>{{ $p->isi }}</p>
    </div>
    @endforeach
  </div>

  <div class="row">
    @foreach ($kategori as $k)


    <div class="col-12">

        <p><span class="badge bg-primary">{{ $k->nama }}</span></p>

        <div class="row d-flex flex-row flex-nowrap overflow-auto">
            @foreach ($k->bukus as $buku)

            <div class="col-xl-3 col-md-3 col-sm-3">
                <div class="card">

                    <div class="card-content">
                        <div class="card-body">

                            <h5 class="card-title">{{ $buku->judul }}</h5>
                            <p class="card-text">
                            <div>{{ $buku->judul }}</div>
                            <div>{{ $buku->pengarang }}</div>
                            <div>{{ $buku->penerbit->nama }}</div>
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between border-0">
                        <form action="{{ route('user.peminjaman.form') }}" method="POST">

                            @csrf

                            <input type="hidden" value="{{$k->id}}" name="buku_id">
                            <button class="btn btn-primary" type="submit">Pinjam</button>
                        </form>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
    </div>



    @endforeach
</div>
@endsection
