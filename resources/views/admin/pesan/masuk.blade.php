
@extends('layouts.master')
@section('content')
<table class="table">
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
                        <form action="{{ route('admin.pesan.masuk.update', ['id' => $p->id]) }}" method="POST">
                            @csrf
                            <input type="hidden" name="penerima_id" value="{{ Auth::user()->id }}">
                            <button type="submit" class="btn btn-success">update
                            </button>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
