@extends('layouts.master')
@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Penerbit</h3>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-penerbit">Tambah Penerbit</button>
        </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Penerbit</th>
                            <th>Nama Penerbit</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($penerbit as $p)

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $p->kode }}</td>
                            <td>{{ $p->nama }}</td>
                            <td>{{ $p->verif }}</td>
                            <td>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update-penerbit{{$p->id }}">update</button>
                           <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-penerbit{{$p->id }}">delete</button>
                        </td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

@include('admin.penerbit.create');
@include('admin.penerbit.edit');
@include('admin.penerbit.delete');

@endsection
