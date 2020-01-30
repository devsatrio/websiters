<?php

namespace App\Http\Controllers\Admin\setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\lib\setRole;
use App\Model\Setting;

class SettingControl extends Controller
{
    protected $rl;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rl = new setRole();
    }
    function index()
    {   
        $data = Setting::all();
        $aks=$this->rl->getAkses();
        $arr=[
            'data'=>$data,
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.setting.index', $mer);        
    }
    function update(Request $request)
    {
        $path = public_path('logo/');
        $rul = [
            'nama' => 'required',
            'telp1' => 'required',
            'telp2' => 'required',
            'alamat' => 'required',
            'kokab' => 'required',
            'prov' => 'required',
            'email' => 'required|email',
            'yt' => 'required',
            'fb' => 'required',
            'ig' => 'required',
            'tw' => 'required',
            'motto' => 'required',
            'ket' => 'required',
            'info' => 'required',
            'map' => 'required',
        ];
        $this->validate($request, $rul);
        $id = $request->id;
        $wb = $request->nama;
        $t1 = $request->telp1;
        $t2 = $request->telp2;
        $al = $request->alamat;
        $kk = $request->kokab;
        $pr = $request->prov;
        $em = $request->email;
        $yt = $request->yt;
        $fb = $request->fb;
        $ig = $request->ig;
        $tw = $request->tw;
        $mt = $request->motto;
        $ket = $request->ket;
        $inf = $request->info;
        $map = $request->map;
        if ($request->hasFile('ico')) {
            $ico = $request->file('ico');
            $icn = $ico->getClientOriginalName();
            $ico->move($path, $icn);          
            $up = Setting::where('id', $id)->update([
                'web' => $wb,
                'ico' => $icn,
                'telp1' => $t1,
                'telp2' => $t2,
                'alamat' => $al,
                'kokab' => $kk,
                'provinsi' => $pr,
                'email' => $em,
                'yt' => $yt,
                'fb' => $fb,
                'ig' => $ig,
                'twitter' => $tw,
                'motto' => $mt,
                'keterangan' => $ket,
                'informasi' => $inf,
                'map' => $map,
            ]);
            if ($up) {
                return redirect()->route('setting')->with('msg', 'Berhasil Disimpan');
            } else {
                return redirect()->route('setting')->with('msg', 'Gagal Disimpan');
            }
        } elseif ($request->hasFile('logo')) {          
            $logo = $request->file('logo');
            $lgn = $logo->getClientOriginalName();
            $logo->move($path, $lgn);
            $up = Setting::where('id', $id)->update([
                'web' => $wb,
                'logo' => $lgn,
                'telp1' => $t1,
                'telp2' => $t2,
                'alamat' => $al,
                'kokab' => $kk,
                'provinsi' => $pr,
                'email' => $em,
                'yt' => $yt,
                'fb' => $fb,
                'ig' => $ig,
                'twitter' => $tw,
                'motto' => $mt,
                'keterangan' => $ket,
                'informasi' => $inf,
                'map' => $map,
            ]);
            if ($up) {
                return redirect()->route('setting')->with('msg', 'Berhasil Disimpan');
            } else {
                return redirect()->route('setting')->with('msg', 'Gagal Disimpan');
            }
        } else {
            $up = Setting::where('id', $id)->update([
                'web' => $wb,
                'telp1' => $t1,
                'telp2' => $t2,
                'alamat' => $al,
                'kokab' => $kk,
                'provinsi' => $pr,
                'email' => $em,
                'yt' => $yt,
                'fb' => $fb,
                'ig' => $ig,
                'twitter' => $tw,
                'motto' => $mt,
                'keterangan' => $ket,
                'informasi' => $inf,
                'map' => $map,
            ]);
            if ($up) {
                return redirect()->route('setting')->with('msg', 'Berhasil Disimpan');
            } else {
                return redirect()->route('setting')->with('msg', 'Gagal Disimpan');
            }
        }
    }
}
