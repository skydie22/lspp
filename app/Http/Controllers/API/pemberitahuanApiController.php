<?php

namespace App\Http\Controllers\API;

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
}
