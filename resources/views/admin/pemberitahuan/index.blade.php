@extends('layouts.master')
@section('content')
<div class="card">
    @if (session('status'))
    <div class="alert alert-{{ session('status') }}" role="alert">
        {{ session('message') }}
    </div>
@endif
    <div class="card-header">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-pemberitahuan">tambah Berita</button>

    </div>

    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>isi Berita </th>
                    <th>status berita</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pemberitahuan as $p)
                    <tr>
                        <td>{{  $loop->iteration }}</td>
                        <td>{{ $p->isi }}</td>
                        <td>{{ $p->status }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@include('admin/pemberitahuan/create')
@endsection
