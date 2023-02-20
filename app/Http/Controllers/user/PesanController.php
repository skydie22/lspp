<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pesan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesanController extends Controller
{
    public function indexUserMasuk()
    {
        $pesanMasuk = Pesan::where('pengirim_id' , '!=' , Auth::user()->id)->where('penerima_id' , Auth::user()->id)->get();

        return view('user.pesan.masuk' ,compact('pesanMasuk'));
    }

    public function indexUserTerkirim()
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=' , Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'admin')->get();

        return view('user.pesan.terkirim' ,compact('pesanTerkirim' , 'penerima'));
    }

    public function kirimPesanUser(Request $request)
    {
        $pesanTerkirim = Pesan::where('penerima_Id' , '!=', Auth::user()->id)->where('pengirim_id' , Auth::user()->id)->get();
        $penerima = User::where('role' , 'admin')->get();
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

    public function updateStatusUser(Request $request, Pesan $pesan)
    {
        $status = Pesan::where('id' , $request->id)->first();
        $status->update([
            'status' => 'terbaca'
        ]);

        return redirect()->back();
    }


    public function destroyPesan($id)
    {
        $pesanTerkirim = Pesan::findOrFail($id);
        $pesanTerkirim->delete();

        return redirect()->back();
    }
}
