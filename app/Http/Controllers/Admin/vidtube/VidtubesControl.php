<?php

namespace App\Http\Controllers\Admin\vidtube;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\lib\setRole;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Vidtube;

class VidtubesControl extends Controller
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
        $data = Vidtube::orderBy('id','DESC')->paginate(15);
        $aks=$this->getAkses();
        $arr=['data' => $data];
        $mer=array_merge($aks, $arr);
        return view('admin.vid.index',$mer);
    }
    function addvid(Request $request)
    {
        $rul = [
            'judul' => 'required',
            'url' => 'required',
        ];
        $this->validate($request, $rul);
        $data = Vidtube::create([
            'judul' => $request->judul,
            'url' => str_replace('watch?v=','embed/',$request->url),
        ]);
        if ($data) {
            return redirect()->route('vid')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('vid')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function updatevid(Request $request)
    {
        $rul = [
            'judul' => 'required',
            'url' => 'required',
        ];
        $this->validate($request, $rul);
        $id = $request->id;
        $data = Vidtube::where('id', $id)->update([
            'judul' => $request->judul,
            'url' => str_replace('watch?v=','embed/',$request->url),
        ]);
        if ($data) {
            return redirect()->route('vid')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('vid')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function delvid($id, $token)
    {
        $del=Vidtube::where('id',$id)->delete();
        if ($del) {
            return redirect()->route('vid')->with('msg', 'Data Berhasil Dihapus');
        } else {
            return redirect()->route('vid')->with('msg', 'Data Gagal Dihapus');
        }
    }
}
