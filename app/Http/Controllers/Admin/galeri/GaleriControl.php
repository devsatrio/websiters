<?php

namespace App\Http\Controllers\Admin\galeri;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\lib\setRole;
use App\Model\Galeri;
use App\Model\Slider;

class GaleriControl extends Controller
{
    protected $rl;
    protected $drl;
    protected $bl;
    protected $dt;
    protected $lap;
    protected $st;
    protected $trx;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rl = new setRole();
    }
    public function getAkses()
    {
        $idr = Auth::user()->idroles;
        $role="Role";
        $bl="blog";
        $dt="data";
        $lap="laporan";
        $st="setting";
        $trx="transaksi";

        // Set Roles
        $this->drl=$this->rl->sRole($idr, $role);
        $this->bl=$this->rl->sRole($idr, $bl);
        $this->dt=$this->rl->sRole($idr, $dt);
        $this->lap=$this->rl->sRole($idr, $lap);
        $this->st=$this->rl->sRole($idr, $st);
        $this->trx=$this->rl->sRole($idr, $trx);

        $akses=array(
            'drl'=>$this->drl,
            'bl'=>$this->bl,
            'dt'=>$this->dt,
            'lap'=>$this->lap,
            'st'=>$this->st,
            'trx'=>$this->trx,
        );
        return $akses;
    }
    function index()
    {
        $idr = Auth::user()->idroles;
        $role = "Role";
        $this->drl = $this->rl->sRole($idr, $role);
        $data = Galeri::join('admins', 'admins.id', '=', 'galeris.admin')
            ->select(DB::raw('admins.nama as adm,galeris.*'))
            ->where('disable', 'n')->paginate(15);
        $aks=$this->getAkses();
        $arr=['data' => $data];
        $mer=array_merge($aks, $arr);
        return view('admin.galeri.index', $mer);
    }
    function galeriadd(Request $request)
    {
        $path = public_path('galeri/');
        if ($request->hasFile('userfile')) {
            $img = $request->file('userfile');
            $imname = date('Y-m-d') . '-' . $img->getClientOriginalName();
            $img->move($path, $imname);
            $token = $request->token;
            $data = Galeri::create([
                'token' => $token,
                'nama' => $imname,
                'admin' => Auth::user()->id,
            ]);
        }
    }
    function galeridel($token)
    {
        $path = public_path('galeri/');
        // $token=$request->token;
        $imname = DB::table('galeris')->where('token', $token)->first();
        $img = $imname->nama;
        $del = Galeri::where('token', $token)->delete();
        if (File::exists($path)) {
            File::delete($path);
        }
    }
    function galerihapus($id, $nama)
    {
        $path = public_path('galeri/' . $nama);
        $del = Galeri::where('id', $id)->delete();
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($del) {
            return redirect()->route('galeri')->with('msg', 'Berhasil Dihapus');
        } else {
            return redirect()->route('galeri')->with('msg', 'Gagal Dihapus');
        }
    }
    function slider()
    {
        $idr = Auth::user()->idroles;
        $role = "Role";
        $this->drl = $this->rl->sRole($idr, $role);
        $data = Slider::orderBy('id', 'DESC')->paginate(15);
        $aks=$this->getAkses();
        $arr=['data' => $data];
        $mer=array_merge($aks, $arr);

        return view('admin.galeri.slider', $mer);
    }
    function addslider(Request $request)
    {
        $path = public_path('slider/');
        if ($request->hasFile('userfile')) {
            $img = $request->file('userfile');
            $imname = date('Y-m-d') . '-' . $img->getClientOriginalName();
            $img->move($path, $imname);
            $token = $request->token;
            $data = Slider::create([
                'token' => $token,
                'nama' => $imname,
            ]);
        }
    }
    function sliderdel($token)
    {
        $path = public_path('slider/');
        // $token=$request->token;
        $imname = DB::table('sliders')->where('token', $token)->first();
        $img = $imname->nama;
        $del = Galeri::where('token', $token)->delete();
        if (File::exists($path)) {
            File::delete($path);
        }
    }
    function sliderhapus($id, $nama)
    {
        $path = public_path('slider/' . $nama);
        $del = Slider::where('id', $id)->delete();
        if (File::exists($path)) {
            File::delete($path);
        }
        if ($del) {
            return redirect()->route('slider')->with('msg', 'Berhasil Dihapus');
        } else {
            return redirect()->route('slider')->with('msg', 'Gagal Dihapus');
        }
    }
    function sliderhide($id, $ak)
    {
        $up = Slider::where('id', $id)->update(['aktif' => $ak]);
        if ($up) {
            return redirect()->route('slider')->with('msg', 'Berhasil Ditampilkan');
        } else {
            return redirect()->route('slider')->with('msg', 'Gagal Ditampilkan');
        }
    }
    function deskslider(Request $request)
    {
        $id = $request->id;
        $desk = $request->desk;
        $link = $request->link;
        $select='';
        $ck=$request->cek;
        if($ck=='on'){
            $select='y';
        }else{
            $select='n';
        }
        $up = Slider::where('id', $id)->update([
            'deskripsi' => $desk,
            'link' => $link,
            'selected'=>$select,
        ]);
        if ($up) {
            return redirect()->route('slider')->with('msg', 'Berhasil Disimpan');
        } else {
            return redirect()->route('slider')->with('msg', 'Gagal Disimpan');
        }
    }
}
