<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use App\Models\Penerbit;
use App\Models\User;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'kode' => 'AA001',
            'fullname' => 'Admin Satu',
            'username' => 'Admin',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'join_date' => '2023-01-06',
            'foto' => '',
            'verif' => 'verified'
        ]);
        User::create([
            'kode' => 'UU001',
            'nis' => '112233',
            'fullname' => 'Ezhar Mahesa',
            'username' => 'ezhar',
            'password' => bcrypt('password'),
            'kelas' => 'XII RPL',
            'alamat' => 'jakarta',
            'role' => 'user',
            'join_date' => date('Y-m-d H:i:s'),
            'foto' => '',
            'verif' => 'verified',
        ]);

        // User::create([
        //     'kode' => 'AA002',
        //     'nis' => '445566',
        //     'fullname' => 'Aldy Revigustian',
        //     'username' => 'aldy',
        //     'password' => bcrypt('password'),
        //     'kelas' => 'XII RPL',
        //     'alamat' => 'jakarta',
        //     'role' => 'user',
        //     'join_date' => date('Y-m-d H:i:s'),
        //     'foto' => '',
        //     'verif' => 'verified',
        // ]);

        Kategori::create([
            'kode' => 'umum',
            'nama' => 'Umum'
        ]);
        Kategori::create([
            'kode' => 'sains',
            'nama' => 'Sains'
        ]);
        Kategori::create([
            'kode' => 'sejarah',
            'nama' => 'Sejarah'
        ]);

        Penerbit::create([
            'kode' => 'erlangga',
            'nama' => 'Erlangga'
        ]);
        Penerbit::create([
            'kode' => 'bukunesia',
            'nama' => 'Bukunesia'
        ]);
        Penerbit::create([
            'kode' => 'gramedia',
            'nama' => 'Gramedia'
        ]);


        Buku::create([
            'judul' => 'Cara meminum Ramune',
            'kategori_id' => 1,
            'penerbit_id' => 1,
            'pengarang' => 'Aldy',
            'tahun_terbit' => '2022',
            'isbn' => '112233',
            'j_buku_baik' => 15,
            'j_buku_rusak' => 8,
            'foto' => ''
        ]);
        Buku::create([
            'judul' => 'Penelitian Meganthropus Anylotus',
            'kategori_id' => 2,
            'penerbit_id' => 2,
            'pengarang' => 'Aldy BudiAsih',
            'tahun_terbit' => '2022',
            'isbn' => '223344',
            'j_buku_baik' => 20,
            'j_buku_rusak' => 5,
            'foto' => ''
        ]);
        Buku::create([
            'judul' => 'Sejarah terbentuknya PKI',
            'kategori_id' => 3,
            'penerbit_id' => 3,
            'pengarang' => 'Aldy YGY',
            'tahun_terbit' => '2022',
            'isbn' => '556677',
            'j_buku_baik' => 30,
            'j_buku_rusak' => 10,
            'foto' => ''
        ]);
        Identitas::create([
            'nama_app' => 'E-Perpus SMKN 10',
            'alamat_app' => 'Jalan Jalan Sendiri :)',
            'email_app' => 'smkn10@perpus.com',
            'nomor_hp' => '081219019667',
            'foto' => ''
        ]);

          Pemberitahuan::create([
            'isi' => 'Sedang ada perbaikan server',
            'status' => 'aktif',
        ]);

    }
}
