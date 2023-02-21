<?php

namespace App\Http\Controllers\API\admin;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class peminjamanApiController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::all();

        return response()->json([
            'msg' => 'berhasil mengambil data peminjaman',
            'data' => $peminjaman
        ]);
    }
}
