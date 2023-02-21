<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class registerApiController extends Controller
{
    public function register(Request $request)
    {
        $anggota = User::where('role' , 'user')->get();
        $count = count($anggota);
        $code = 'UU00' . $count + 1 ;

        $user = User::create([
            'kode' => $code,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'role' => 'user',
            'verif' => 'unverified',
            'join_date' => Carbon::now()
        ]);


         if ($user) {
            return response()->json([
                'msg' => 'berhasil registrasi, silahkan hubungi admin untuk  verifikasi'
            ],200);
        }else {
            return response()->json([
                'msg' => 'gagal registrasi'
            ],401);
        }

    }
}
