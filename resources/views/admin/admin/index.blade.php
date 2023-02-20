@extends('layouts.master')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Admin</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-admin">Tambah Admin</button>
        </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Lengkap</th>
                            <th>Nama Pengguna</th>
                            <th>Terakhir Login </th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admin as $a)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $a->kode }}</td>
                            <td>{{ $a->username }}</td>
                            <td>{{$a->fullname  }}</td>
                            <td>{{ $a->terakhir_login }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update-admin{{ $a->id }}">update</button>
                           <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-admin{{ $a->id }}">delete</button>
                        </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@include('/admin/admin/create')
@include('/admin/admin/delete')
@include('/admin/admin/edit')
@endsection
