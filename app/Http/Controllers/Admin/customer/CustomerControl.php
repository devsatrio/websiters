<?php

namespace App\Http\Controllers\Admin\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lib\setRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Customer;


class CustomerControl extends Controller
{    
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rl = new setRole();
    }
    
    function index(){
         // 
         $data=Customer::paginate(10);
         $aks=$this->rl->getAkses();
         $arr=[
             'data'=>$data,
         ];
         $mer=array_merge($aks, $arr);
         return view('admin.customer.index',$mer);
    }
    function add(Request $request){
        $rul = [            
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',           
        ];
        $this->validate($request, $rul);
        // simpan
        $nam=$request->nama;
        $al=$request->alamat;
        $tl=$request->telp;
        $data=Customer::create([
            'nama'=>$nam,
            'alamat'=>$al,
            'telp'=>$tl
        ]);
        if($data){
            return redirect()->route('customer')->with('msg','Berhasil Disimpan');
        }else{
            return redirect()->route('customer')->with('msg', 'Gagal Disimpan');
        }

    }
    function update(Request $request){
        $rul = [            
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',           
        ];
        $this->validate($request, $rul);
        // simpan
        $id=$request->id;
        $nam=$request->nama;
        $al=$request->alamat;
        $tl=$request->telp;
        $data=Customer::where('id',$id)->update([
            'nama'=>$nam,
            'alamat'=>$al,
            'telp'=>$tl
        ]);
        if($data){
            return redirect()->route('customer')->with('msg','Berhasil Disimpan');
        }else{
            return redirect()->route('customer')->with('msg', 'Gagal Disimpan');
        }

    }
    function del($token,$id){
        $del=Customer::where('id',$id)->delete();
        if($del){
            return redirect()->route('customer')->with('msg','Berhasil Disimpan');
        }else{
            return redirect()->route('customer')->with('msg', 'Gagal Disimpan');
        }
    }
    function cari(Request $request){
        $car=$request->cari;
        $data=Customer::where('nama','like','%'.$car.'%')->get();
        $aks=$this->getAkses();
        $arr=[
            'data'=>$data,
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.customer.index',$mer);
    }
}

