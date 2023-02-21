<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class pemberitahuanApiController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::all();

        return response()->json([
            'data' => $pemberitahuan
        ]);
    }

    public function store(Request $request)
    {
        $pemberitahuan = Pemberitahuan::create($request->all());

        if($pemberitahuan) {
           return response()->json([
            'msg' => 'pemberitahuan created',
            'data' => $pemberitahuan
           ]);
        }

    }

    public function update(Request $request, $id)
    {
        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->update([
            'isi' => $request->isi,
            'status' => $request->status
        ]);
        return response()->json([
            'msg' => 'pemberitahuan updated',
            'data' => $pemberitahuan
        ]);
    }

    public function destroy($id)
    {
        $pemberitahuan = Pemberitahuan::findOrFail($id);
        $pemberitahuan->delete();

        return response()->json([
            'msg' => 'pemberitahuan deleted',
            'data' => $pemberitahuan
        ]);
    }
}
