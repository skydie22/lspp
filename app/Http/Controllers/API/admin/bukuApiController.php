<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use Illuminate\Http\Request;

class bukuApiController extends Controller
{
    public function index()
   {
    $buku = Buku::all();

    return response()->json([
        'data' => $buku
    ]);
   }

   public function store(Request $request)
   {
    $buku = Buku::all();
    $buku = Buku::create($request->all());

    return response()->json([
        'msg' => 'data created',
        'data' => $buku
    ]);
   }

   public function update(Request $request, $id)
   {
       $buku = Buku::find($id);
       $buku->update($request->all());


       return response()->json([
        'msg' => 'data updated',
        'data' => $buku
    ]);   }

   public function destroy($id)
   {
       $buku = Buku::find($id);
       $buku->delete();

       return response()->json([
        'msg' => 'data deleted',
        'data' => $buku
    ]);
    }
}
