<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginApiController extends Controller
{
    public function login(Request $request)
    {
        $lastLogin = Carbon::now();
        $credentials = [
            'username' => $request['username'],
            'password' => $request['password']
        ];

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'msg' => 'invalid credentials'
            ]);
        }

        if (Auth::user()->verif == 'unverified') {
            Auth::logout();
            return response()->json([
                'msg' => 'user unverified'
            ]);
        }

        $user = tap(User::where('id' , Auth::user()->id)->update([
            'terakhir_login' => $lastLogin
        ]));

        return response()->json([
            'data' => Auth::user(),
            'token' => auth()->user()->createToken('secret')->plainTextToken
        ]
        );
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'msg' => 'berhasil logout'
        ],200);

    }
}
