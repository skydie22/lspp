@extends('layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Pesan Masuk</h3>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>pengirim</th>
                    <th>Judul pesan</th>
                    <th>isi pesan </th>
                    <th>status pesan</th>
                    <th>tanggal kirim</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pesanMasuk as $p)
                <tr>
                    <td>{{  $loop->iteration }}</td>
                    <td>{{ $p->pengirim->fullname }}</td>
                    <td>{{ $p->judul }}</td>
                    <td>{{ $p->isi }}</td>
                    <td>{{ $p->status == 'terkirim' ? 'belum dibaca' : 'terbaca' }}</td>
                    <td>{{ $p->tanggal_kirim }}</td>
                    <td>
                        @if ($p->status == 'terkirim')
                            <form action="{{ route('user.pesan.masuk.update', ['id' => $p->id]) }}" method="POST">
                                @csrf
                                <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                                <button type="submit" class="btn btn-primary"><i class="bi bi-check"></i>
                                </button>

                            </form>
                            @else
                            <button type="button" class="btn btn-primary"><i class="bi bi-check-all"></i>
                        @endif

                    </td>
                </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

@endsection
