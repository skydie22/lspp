<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class identitasApiController extends Controller
{
    public function index()
    {
        $identitas = Identitas::all();

        return response()->json([
            'data' => $identitas
        ]);
    }

    public function update(Request $request)
    {
        $identitas = Identitas::first();

        if ($request->foto == null) {
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_app' => $request->alamat_app,
            ]);
        } else {
            $imageName = time() . '.' . $request->foto->extension();
            $request->foto->move(public_path('img/identitas/'), $imageName);
            $identitas->update([
                'nama_app' => $request->nama_app,
                'email_app' => $request->email_app,
                'nomor_hp' => $request->nomor_hp,
                'alamat_app' => $request->alamat_app,
                "foto" => $imageName
            ]);
        }

        return response()->json([
            'msg' => 'Berhasil mengedit identitas',
            'data' => $identitas
        ]);
    }
}
