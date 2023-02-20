<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Pemberitahuan;
use Illuminate\Http\Request;

class PemberitahuanController extends Controller
{
    public function index()
    {
        $pemberitahuan = Pemberitahuan::all();

        return view('admin.pemberitahuan.index', compact('pemberitahuan'));
    }

    public function store(Request $request)
    {
        $pemberitahuan = Pemberitahuan::create($request->all());

        if($pemberitahuan) {
            return redirect()->back()->with('status', 'success')
            ->with('message', "Berhasil membuat pemberitahuan");
        }

    }
}
