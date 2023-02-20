<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class pesanController extends Controller
{
    public function indexAdminMasuk()
    {
        $pesanMasuk = Pesan::where('pengirim_id' , '!=', Auth::user()->id)->where('penerima_id' , Auth::user()->id)->get();

        return view('admin.pesan.masuk' ,compact('pesanMasuk'));
    }

    public function indexAdminTerkirim()
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=' , Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'user')->get();

        return view('admin.pesan.terkirim' ,compact('pesanTerkirim' , 'penerima'));
    }

    public function kirimPesanAdmin(Request $request)
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=', Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'user')->get();
        $pesanTerkirim = Pesan::create([
            'penerima_id' => $request->penerima_id,
            'pengirim_id' => $request->pengirim_id,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'status' => 'terkirim',
            'tanggal_kirim' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function updateStatusAdmin(Request $request, Pesan $pesan)
    {
        $status = Pesan::where('id' , $request->id)->first();
        $status->update([
            'status' => 'terbaca'
        ]);

        return redirect()->back();
    }
}
