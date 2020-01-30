<?php

namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Model\Karyawan;

class LoginControl extends Controller
{
    function login(Request $request)
    { // cek auth
        $this->validate($request,[
            'user'=>'required',
            'pass'=>'required',
        ]);
        $user = $request->user;
        $pass = $request->pass;
        $cek = Karyawan::where('username', $user)->first();
        if (Hash::check($pass, $cek->password) || $user == $cek->username) {
            // update token
            $tokenn = $this->generateRandomString();
            $cek->where(['username'=>$user])->update([
                'api_token' => $tokenn,
            ]);
            $data = Karyawan::where('username', $user)->get();
            $print = ['sts'=>'1','msg' => 'Login Berhasil', 'data' => $data];
        } else {
            $print = ['sts'=>'0','msg' => 'not Allowed'];
        }
        return response()->json($print);
    }
    function generateRandomString($length = 80)
    {
        $karakkter = '012345678dssd9abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $panjang_karakter = strlen($karakkter);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= $karakkter[rand(0, $panjang_karakter - 1)];
        }
        return $str;
    }
}
