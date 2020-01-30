<?php

namespace App\Http\Controllers\Admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\lib\setRole;
use App\Model\Admin;

class AkunControl extends Controller
{
    protected $rl;
    
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rl = new setRole();
    }
    function index()
    {       
        $id = Auth::user()->id;
       
        $data = Admin::where('id',$id)->get();
        $aks=$this->rl->getAkses();
        $arr=[
            'data'=>$data,
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.setting.akun', $mer);
    }
    function akunupdate(Request $request)
    {
        $rul=[
            'nama'=>'required',
            'email'=>'required|email',
            'username'=>'required',            
        ];
        $this->validate($request,$rul);
        $id=$request->id;
        $nama=$request->nama;
        $email=$request->email;
        $username=$request->username;
        if(!empty($request->password)){
            $pass=$request->password;
            // dd($pass);
            $up=Admin::where('id',$id)->update([
                'nama'=>$nama,
                'email'=>$email,
                'username'=>$username,  
                'password'=>Hash::make($pass),
            ]);
            if($up){
                return redirect()->route('akun.setting')->with('msg','Berhasil Disimpan');
            }else{
                return redirect()->route('akun.setting')->with('msg','Gagal Disimpan');
            }
        }else{
            $up=Admin::where('id',$id)->update([
                'nama'=>$nama,
                'email'=>$email,
                'username'=>$username,                
            ]);
            if($up){
                return redirect()->route('akun.setting')->with('msg','Berhasil Disimpan');
            }else{
                return redirect()->route('akun.setting')->with('msg','Gagal Disimpan');
            }
        }
    }
}
