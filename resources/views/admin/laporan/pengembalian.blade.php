<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
		<center>
      <h4>Laporan Perpustakaan</h4>
      <p style="font-weight:bold">{{ $identitas->nama_app }}</p>
      <p style="font-weight:bold">{{ $identitas->alamat_app }}|{{ $identitas->nomor_hp }}</p><br>
    </center>

	<table class='table table-bordered'>
		<thead>
            <tr>
              <th>No</th>
              <th>Nama Anggota</th>
              <th>Judul Buku</th>
              <th>Tanggal Peminjaman</th>
              <th>Tanggal Pengembalian</th>
              <th>Kondisi Buku Saat Dipinjam</th>
              <th>Kondisi Buku Saat Dikembalikan</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($data as $p)
            <tr>
                <th>{{ $loop->iteration }}</th>
                <th>{{ $p->user->fullname }}</th>
                <th>{{ $p->buku->judul }}</th>
                <th>{{ $p->tanggal_peminjaman }}</th>
                <th>{{ $p->tanggal_pengembalian }}</th>
                <th>{{ $p->kondisi_buku_saat_dipinjam }}</th>
                <th>{{ $p->kondisi_buku_saat_dikembalikan }}</th>
                <th>{{ $p->denda }}</th>
            </tr>
            @endforeach
        </tbody>
	</table>

</body>
</html>
