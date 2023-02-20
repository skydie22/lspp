@extends('layouts.master')
@section('content')

<div class="page-heading">
    <div class="page-title">
      <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
          <h3>Pemberitahuan</h3>

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
        </div>
      </div>
    </div>
    <section class="section">
      <div class="card">
        @if (session('status'))
        <div class="alert alert-{{ session('status') }}" role="alert">
            {{ session('message') }}
        </div>
    @endif
        <div class="card-header">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambah-pemberitahuan">tambah Pemberitahuan</button>
        </div>
        <div class="card-body">
          <table class="table table-striped" id="table1">
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
                        <td>
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#update-pemberitahuan{{ $p->id }}">update</button>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-pemberitahuan{{ $p->id }}">delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </section>
  </div>

@include('admin/pemberitahuan/create')
@include('admin/pemberitahuan/edit')
@include('admin/pemberitahuan/delete')
@endsection
