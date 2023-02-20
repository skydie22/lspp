<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class PengembalianController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::where('status' , 'aktif')->get();
    }
}
