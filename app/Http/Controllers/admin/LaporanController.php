<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use App\Models\Peminjaman;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::get();
        $anggota = User::where('role' , 'user')->get();
        return view('admin.laporan.index', compact('peminjaman','anggota'));
    }

    public function cetakPeminjaman(Request $request)
    {
        $data = Peminjaman::where('tanggal_peminjaman' , $request->tanggal_peminjaman)->get();
        $identitas = Identitas::first();


                $pdf = Pdf::loadview('admin.laporan.peminjaman', ['data' => $data, 'identitas' => $identitas]);
                return $pdf->download('laporan-perpus.pdf');
    }

    public function cetakPengembalian(Request $request)
    {
        $data = Peminjaman::where('tanggal_pengembalian', $request->tanggal_pengembalian)->get();
        $identitas = Identitas::first();

        $pdf = Pdf::loadview('admin.laporan.pengembalian', ['data' => $data,'identitas' => $identitas]);
        return $pdf->download('laporan-perpus.pdf');

    }

    public function cetakPeranggota(Request $request)
    {
        // $data = User::where('role' , 'user');
        $data = Peminjaman::where('user_id' , $request->user_id)->with('buku' , 'user')->get();
        $identitas = Identitas::first();

        $pdf = Pdf::loadview('admin.laporan.peranggota', ['data' => $data, 'identitas' => $identitas]);
        return $pdf->download('laporan-perpus.pdf');
    }
}
