<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    public function index()
    {
        $penerbit = Penerbit::all();
        $count = count($penerbit);
        $code = 'P00' . $count + 1;
        return view('admin.penerbit.index', compact('penerbit','code'));
    }

    public function store(Request $request)
    {
        $penerbit = Penerbit::all();
        $count = count($penerbit);
        $code = 'P00' . $count + 1;

        $penerbit = Penerbit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'verif' => 'verified'
        ]);

        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->update([
            'nama' => $request->nama,

        ]);
        return redirect()->back();
    }

    public function destroy($id)
    {
        $penerbit = penerbit::findOrFail($id);
        $penerbit->delete();

        return redirect()->back();
    }
}
