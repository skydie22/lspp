<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function indexAnggota()
    {
        $anggota = User::where('role' , 'user')->get();
        $count = count($anggota);
        $code = 'UU00' . $count + 1 ;
        return view('admin.anggota.index', compact('anggota','code'));
    }

    public function indexAdmin()
    {
        $admin = User::where('role' , 'admin')->get();
        $count = count($admin);
        $code = 'UU00' . $count + 1 ;
        return view('admin.admin.index', compact('admin','code'));
    }

    public function storeAnggota(Request $request)
    {
        $anggota = User::where('role' , 'user')->get();
        $count = count($anggota);
        $code = 'UU00' . $count + 1 ;

        $anggota = User::create([
            'kode' => $request->kode,
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'role' => 'user',
            'verif' => 'verified',
            'join_date' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function storeAdmin(Request $request)
    {
        $admin = User::where('role' , 'admin')->get();
        $count = count($admin);
        $code = 'AA00' . $count + 1 ;

        $admin = User::create([
            'kode' => $request->kode,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => 'admin',
            'verif' => 'verified',
            'join_date' => Carbon::now()
        ]);

        return redirect()->back();
    }

    public function updateAnggota(Request $request, $id)
    {
        $anggota = User::where('role' , 'user')->where('id' , $id);
        $anggota->update([
            'nis' => $request->nis,
            'fullname' => $request->fullname,
            'username' => $request->username,
            'kelas' => $request->kelas,
            'alamat' => $request->alamat,
            'verif' => $request->verif_id
        ]);
        return redirect()->back();
    }

    public function updateAdmin(Request $request, $id)
    {
        $admin = User::where('role' , 'admin')->where('id' , $id);
        $admin->update([
            'fullname' => $request->fullname,
            'username' => $request->username,
        ]);
        return redirect()->back();
    }

    public function destroyAnggota($id)
    {
        $anggota = User::where('role' , 'user')->where('id' , $id);
        $anggota->delete();

        return redirect()->back();
    }

    public function destroyAdmin($id)
    {
        $admin = User::where('role' , 'admin')->where('id' , $id);
        $admin->delete();

        return redirect()->back();
    }
}
