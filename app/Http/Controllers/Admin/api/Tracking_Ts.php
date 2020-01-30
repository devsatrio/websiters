<?php

namespace App\Http\Controllers\Admin\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Model\Karyawan;
use App\Model\LaporanTrack;


class Tracking_Ts extends Controller
{
     public function __construct(){
        $this->middleware('api.cek');
     }
    
    function index()
    {
        $out = ['status' => 'ok'];
        return response()->json($out);
    }   
    function history($idk)
    {
        $data=LaporanTrack::where('idk',$idk)->leftjoin('karyawans','karyawans.id','=','laporan_tracks.idk')->select(DB::raw('karyawans.nama,laporan_tracks.*'))->orderBy('laporan_tracks.id','DESC')->take(20)->get();
        if($data){
            return response()->json(['tracking'=>$data,'sts'=>'1','msg'=>'ok']);
        }
    }
    function simpan(Request $request)
    {
        $path=public_path('lap_track');
        if($request->hasFile("img")){
            $img=$request->file("img");
            $imgnama=date('Y-m-d').'-'.$img->getClientOriginalName();
            $img->move($path,$imgnama);
            $idk=$request->idk;
            $tempat=$request->place;
            $lat=$request->lat;
            $lot=$request->lot;
            $konsumen=$request->konsumen;
            $telp=$request->telp;
            $report=$request->report;
            // simpan
            $data=LaporanTrack::create([
                'place'=>$tempat,
                'lat'=>$lat,
                'lot'=>$lot,
                'konsumen'=>$konsumen,
                'telp'=>$telp,
                'report'=>$report,
                'idk'=>$idk,
                'foto'=>$imgnama,
                'tgl'=>date('Y-m-d')
            ]);
            $out=['msg'=>'Berhasil Disimpan','sts'=>'1'];
            if($data){
                return response()->json($out);
            }
        }
    }
    function upakun(Request $request){
        $id=$request->ids;
        $user=$request->user;
        $pas=Hash::make($request->pass);
        $d=Karyawan::where('id',$id)->update([
            'password'=>$pas,
        ]);
        $print = ['sts'=>'1','msg' => 'Update Berhasil'];
        if($d){
            return response()->json(($print));
        }
    }
}
