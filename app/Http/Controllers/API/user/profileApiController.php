<?php

namespace App\Http\Controllers\API\user;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileApiController extends Controller
{
    public function index()
    {
        $profile = User::where('id', Auth::user()->id)->get();

        return response()->json([
            'data' => $profile
        ]);
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;

        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('img/profile/'), $imageName);

        $user = User::find(Auth::user()->id)->update($request->all());

        $user2 = User::find($id)->update([
            "password" => Hash::make($request->password),
            "foto" => $imageName
        ]);
        if ($user && $user2) {
            return response()->json([
                "message" => "Successfully edit data",
            ]);
        }
    }
}
