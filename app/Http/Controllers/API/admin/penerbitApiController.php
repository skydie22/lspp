<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class penerbitApiController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        return response()->json([
            'data' => $penerbit
        ]);
    }

    public function store(Request $request)
    {
        $penerbit = Penerbit::all();
        $count = count($penerbit);
        $code = 'P00'. $count + 1;

        $penerbit = Penerbit::create([
            'kode' => $code,
            'verif' => 'verified',
            'nama' => $request->nama
        ]);

        return response()->json([
            'msg' => 'data created',
            'data' => $penerbit
        ]);
    }

    public function update(Request $request, $id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->update([
            'nama' => $request->nama,

        ]);
        return response()->json([
            'msg' => 'data updated',
            'data' => $penerbit
        ]);    }

    public function destroy($id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->delete();
        return response()->json([
            'msg' => 'data deleted',
            'data' => $penerbit
        ]);
    }
}
