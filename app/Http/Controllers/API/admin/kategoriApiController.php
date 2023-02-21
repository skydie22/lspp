<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class kategoriApiController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return response()->json([
            'data' => $kategori
        ]);
    }

    public function store(Request $request)
    {
        $kategori = Kategori::all();
        $count = count($kategori);
        $code = 'K00'. $count + 1;
        $kategori = Kategori::create([
            'kode' => $code,
            'nama' => $request->nama
        ]);
        return response()->json([
            'msg' => 'data created',
            'data' => $kategori
        ]);
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama
        ]);

        return response()->json([
            'msg' => 'data updated',
            'data' => $kategori
        ]);    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json([
            'msg' => 'data deleted',
            'data' => $kategori
        ]);
    }
}
