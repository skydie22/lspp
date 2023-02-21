<?php

namespace App\Http\Controllers\API\user;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pengembalianApiController extends Controller
{
    public function index()
    {
        $pengembalian =  Peminjaman::where('user_id' , Auth::user()->id)->where('tanggal_pengembalian' , null)->get();
        return response()->json([
            'data' => $pengembalian
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kondisi_buku_saat_dikembalikan' => 'required',
            'buku_id' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);
        $cek = Peminjaman::where('user_id' , Auth::user()->id)
                            ->where('buku_id', $request->buku_id)
                            ->where('tanggal_pengembalian', null)
                            ->first();
        $cek->update([
            'tanggal_pengembalian' => $request->tanggal_pengembalian,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan
        ]);

        if ($request->kondisi_buku_saat_dikembalikan == 'baik' && $request->kondisi_buku_saat_dipinjam == 'baik') {
            $buku = Buku::where('id', $request->buku_id)->first();

            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik + 1

            ]);

            $cek->update([
                'denda' => 0
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'rusak' && $cek->kondisi_buku_saat_dipinjam == 'baik') {
            $buku = Buku::where('id', $request->buku_id)->first();

            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1

            ]);

            $cek->update([
                'denda' => 20000
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'rusak' && $cek->kondisi_buku_saat_dipinjam == 'rusak') {
            $buku = Buku::where('id', $request->buku_id)->first();

            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1

            ]);

            $cek->update([
                'denda' => 0
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'hilang') {
            $cek->update([
                'denda' => 50000
            ]);
        }

        if (!$cek) {
            return response()->json([
                'msg' => 'gagal mengembalikan buku'
            ],400);
        }

        return response()->json([
            'msg' => 'berhasil mengembalikan buku',
            'data' => $cek
        ]);
    }
}
