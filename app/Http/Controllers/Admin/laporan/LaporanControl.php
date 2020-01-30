<?php

namespace App\Http\Controllers\Admin\laporan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\lib\setRole;
use App\Model\LaporanTrack;
use App\Model\Karyawan;

class LaporanControl extends Controller
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

        $data = LaporanTrack::orderBy('id', 'DESC')->paginate(15);
        $kar=Karyawan::all();
        $aks=$this->getAkses();
        $arr=[
            'data' => $data,
            'kar'=>$kar,
        ];
        $mer=array_merge($aks, $arr);

        return view('admin.laporan.track',$mer);
    }
    function cari(Request $request){
        $idr = Auth::user()->idroles;
        $role = "Role";
        $this->drl = $this->rl->sRole($idr, $role);
        $rul=[
            'tglawal'=>'required',
            'tglakhir'=>'required',
        ];
        $this->validate($request,$rul);
        $idk=$request->ts;
        $tgl1=$request->tglawal;
        $tgl2=$request->tglakhir;
        
        $kar=Karyawan::all();
        if($idk=='all'){
            $data=LaporanTrack::join('karyawans','karyawans.id','=','laporan_tracks.idk')->select(DB::raw('laporan_tracks.*,karyawans.*,karyawans.id as idkar'))->whereBetween('tgl',[$tgl1,$tgl2])->orderBy('karyawans.id')->get();        
        }else{
            $data=LaporanTrack::where('karyawans.id',$idk)->join('karyawans','karyawans.id','=','laporan_tracks.idk')->select(DB::raw('laporan_tracks.*,karyawans.*,karyawans.id as idkar'))->whereBetween('tgl',[$tgl1,$tgl2])->get();        
        }
        $aks=$this->getAkses();
        $arr=[
            'data' => $data,
            'kar'=>$kar,
            'tgl1'=>$tgl1,
            'tgl2'=>$tgl2,
            'idk'=>$idk,
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.laporan.track',$mer);
    }
    function print_track($tgl1,$tgl2,$idk,$img){
        if($idk=='all'){
            $data=LaporanTrack::join('karyawans','karyawans.id','=','laporan_tracks.idk')->select(DB::raw('laporan_tracks.foto as imgp,laporan_tracks.*,karyawans.*,karyawans.id as idkar'))->whereBetween('tgl',[$tgl1,$tgl2])->orderBy('karyawans.id')->get();        
        }else{
            $data=LaporanTrack::where('karyawans.id',$idk)->join('karyawans','karyawans.id','=','laporan_tracks.idk')->select(DB::raw('laporan_tracks.foto as imgp,laporan_tracks.*,karyawans.*,karyawans.id as idkar'))->whereBetween('tgl',[$tgl1,$tgl2])->get();        
        }
        return view('admin.laporan.print_track',[
            'data' => $data,
            'img'=>$img,
        ]);
    }
    function deltrack($id){
        $del=LaporanTrack::where('id',$id)->delete();
        if($del){
            return redirect()->route('laporan.track')->with('msg','Berhasil Dihapus');
        }else{
            return redirect()->route('laporan.track')->with('msg','Gagal Dihapus');
        }
    }
}
