<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Buku;
use App\Models\Identitas;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $anggota = User::where('role' , 'user')->count();
        $buku = Buku::count();
        $peminjaman = Peminjaman::count();
        $pengembalian =  Peminjaman::where('user_id' , Auth::user()->id)->where('tanggal_pengembalian', null)->count();
        $identitas = Identitas::first();
        return view('admin.dashboard', compact('anggota','peminjaman','pengembalian','buku','identitas'));    }
}
