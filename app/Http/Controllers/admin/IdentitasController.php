<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Identitas;
use Illuminate\Http\Request;

class IdentitasController extends Controller
{
    public function index()
    {
        $identitas = Identitas::first();

        return view('admin.identitas.index', compact('identitas'));
    }

    public function update(Request $request)
    {

        if ($request->foto != null) {
            $imageName = time() . '.' . $request->foto->extension();

            $request->foto->move(public_path('img/identitas/'), $imageName);

            $user = Identitas::find(1)->update($request->all());

            $user2 = Identitas::find(1)->update([
                "foto" => $imageName
            ]);

            if ($user && $user2) {
                return redirect()->back();
            }
        } else {
            $user = Identitas::find(1)->update($request->all());

            return redirect()->back();
        }
    }

}
