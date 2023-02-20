<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Kategori;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::where('status', 'aktif')->get();
        $kategori = Kategori::all();
        $buku = Buku::all();
        return view('user.dashboard',compact('pemberitahuan', 'kategori', 'buku'));
    }
}
