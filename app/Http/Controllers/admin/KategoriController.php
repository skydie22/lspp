<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $count = count($kategori);
        $code = 'K00' . $count + 1;
        return view('admin.kategori.index' , compact('kategori' , 'code'));
    }

    public function store(Request $request)
    {
        $kategori =  Kategori::all();
        $count = count($kategori);
        $code = 'K00' . $count + 1;
        $kategori = Kategori::create([
            'kode' => $request->kode,
            'nama' => $request->nama
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'nama' => $request->nama
        ]);

        return redirect()->back();
    }

    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return redirect()->back();
    }


}
