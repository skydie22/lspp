<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Pemberitahuan;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengembalianController extends Controller
{
    public function indexForm()
    {
        $judulBuku =  Peminjaman::where('user_id' , Auth::user()->id)->where('tanggal_pengembalian' , null)->get();
        return view('user.pengembalian.form', compact('judulBuku'));
    }

    public function indexRiwayat()
    {
        $pengembalian = Peminjaman::where('user_id' , Auth::user()->id)->get();
        return view('user.pengembalian.riwayat' , compact('pengembalian'));

    }

    public function storeForm(Request $request)
    {
        $request->validate([
            'kondisi_buku_saat_dikembalikan' => 'required',
            'buku_id' => 'required',
            'tanggal_pengembalian' => 'required'
        ]);

        $cek = Peminjaman::where('user_id', Auth::user()->id)
            ->where('buku_id', $request->buku_id)
            ->where('tanggal_pengembalian', null)
            ->first();

        $cek->update([
            'tanggal_pengembalian'  => $request->tanggal_pengembalian,
            'kondisi_buku_saat_dikembalikan' => $request->kondisi_buku_saat_dikembalikan
        ]);

        $buku = Buku::where('id', $request->buku_id)->first();

        if ($request->kondisi_buku_saat_dikembalikan == 'baik' && $cek->kondisi_buku_saat_dipinjam == "baik") {

            $buku->update([
                'j_buku_baik' => $buku->j_buku_baik + 1

            ]);

            $cek->update([
                'denda' => 0
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'rusak' && $cek->kondisi_buku_saat_dipinjam == 'baik') {

            $buku->update([
                'j_buku_rusak' => $buku->j_buku_rusak + 1

            ]);

            $cek->update([
                'denda' => 20000
            ]);
        }

        if ($request->kondisi_buku_saat_dikembalikan == 'rusak' && $cek->kondisi_buku_saat_dipinjam == 'rusak') {

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
            return redirect()->back();
        }
        return redirect()->route('user.pengembalian.riwayat');
    }
}
