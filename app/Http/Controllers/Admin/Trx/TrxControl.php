<?php

namespace App\Http\Controllers\Admin\Trx;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\lib\setRole;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Model\Pakan;
use App\Model\Barang;
use App\Model\Customer;
use App\Model\MdetailTrx;
use App\Model\MPengeluaran;

class TrxControl extends Controller
{
    // public function __construct(){
    //     $this->middleware('guest:admin')->except('logout');   
    //   }
  

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rl = new setRole();
    }
   
    function index(){        
        $idadmin=Auth::user()->id;
        $inv="PM".date('dmY').'-'.$idadmin;
        // dd($inv);
        // Celk no invoice
        $cekinv=DB::table('m_trxes')->where('inv', 'like', '%'.$inv.'%')->max('inv');
        if ($cekinv) {
            $kode=(int) substr($cekinv, 13, 18);
            $kode++;
            $kodeakhir=$inv."-".sprintf("%05s", $kode);
        } else {            
            $kodeakhir=$inv."-00001";
        }     
        // 
        $aks=$this->rl->getAkses();       
        $arr=[
            'inv'=>$kodeakhir,
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.trx.index',$mer);
        
    }
    function noPo(){
        $idadmin=Auth::user()->id;
        $inv="PMPO".date('dmY').'-'.$idadmin;
        // Celk no PO
        $cekinv=DB::table('m_trxes')->where('po', 'like', '%'.$inv.'%')->max('po');
        if ($cekinv) {
            $kode=(int) substr($cekinv, 13, 18);
            $kode++;
            $kodeakhir=$inv."-".sprintf("%05s", $kode);
        } else {            
            $kodeakhir=$inv."-00001";
        }      
        return response()->json(['kode'=>$kodeakhir]);
    }
    function noSj(){
        $idadmin=Auth::user()->id;
        $inv="PMSJ".date('dmY').'-'.$idadmin;
        // Celk no PO
        $cekinv=DB::table('m_trxes')->where('sj', 'like', '%'.$inv.'%')->max('sj');
        if ($cekinv) {
            $kode=(int) substr($cekinv, 13, 18);
            $kode++;
            $kodeakhir=$inv."-".sprintf("%05s", $kode);
        } else {            
            $kodeakhir=$inv."-00001";
        }    
        return response()->json(['kode'=>$kodeakhir]);
    }
    function Cs(){
        
    }
    function pakan(){
        $data=Pakan::all();
        return response()->json(['data'=>$data]);
    }
    function suplemen(){
        $data=Barang::all();
        return response()->json(['data'=>$data]);
    }
    function stokProd($id,$pil){
        if($pil=="Suplemen"){
            $data=Barang::where('id',$id)->first();
        }else{
            $data=Pakan::where('id',$id)->first();
        }
        return response()->json(['stok'=>$data->stok]);
    }
    function customer(){
        $data=Customer::orderBy('nama','ASC')->get();
        return response()->json(['data'=>$data]);
    }
    function detCs($id){
        $data=Customer::where('id',$id)->first();
        return response()->json($data);
    }
    function listProd($id,$pil){
        if($pil=="Suplemen"){
            $data=Barang::where('id',$id)->first();
        }else{
            $data=Pakan::where('id',$id)->first();
        }
        return response()->json($data);
    }
    function detailTrx($id){
        $data=MdetailTrx::where('idTrx',$id)->get();
        return response()->json(['data'=>$data]);
    }
    function add_detailTrx(Request $request){
        $id=Auth::user()->id;
        $tgl=date('Y-m-d H:i:s');
        $inv=$request->inv;
        $kode=$request->kode;
        $pr=$request->prd;
        $jn=$request->jenis;
        $hg=$request->hg;
        $qty=$request->qty;
        $sbt=$hg*$qty;
        $dsk=$request->dsk;
        $total=$request->total;        
        $save=MdetailTrx::create([
            'idTrx'=>$inv,
            'tgl'=>$tgl,
            'kode_barang'=>$kode,
            'barang'=>$pr,
            'jenis'=>$jn,
            'qty'=>$qty,
            'harga'=>$hg,
            'subtotal'=>$sbt,
            'diskon'=>$dsk,
            'total'=>$total,
            'admin'=>$id
        ]);        
    }
    function delbarang($id){
        $del=MdetailTrx::where('id',$id)->delete();
        if($del){
            $print=['msg'=>'Berhasil Dihapus'];
        }else{
            $print=['msg'=>'Gagal Dihapus'];
        }
        return response()->json($print);
    }
    // get Total
    function totalTrx($id){
        $data=MdetailTrx::where('idTrx',$id)->select(DB::raw('sum(subtotal) as stotal, sum(diskon) as potongan, sum(total) as total_akhir'))->first();
        return response()->json($data);
    }
    // piutang
    function piutang(){
        $aks=$this->rl->getAkses();       
        $arr=[
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.trx.piutang',$mer);
    }
    // pengeluaran
    function pengeluaran(){
        $aks=$this->rl->getAkses();       
        $arr=[
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.trx.pengeluaran',$mer);
    }
    function showpengeluaran(){
        $tgl=date('Y-m-d');
        $data=MPengeluaran::where('tgl',$tgl)->get();
        if($data){
            $print=['data'=>$data];
        }
        return response()->json($print);
    }
    function addpengeluaran(Request $request){
        $ket=$request->ket;
        $nom=$request->nom;
        $ybs=$request->ybs;
        $tgl=date("Y-m-d");
        $admmin=Auth::user()->nama;

        $data=MPengeluaran::create([
            'tgl'=>$tgl,
            'keterangan'=>$ket,
            'jumlah'=>$nom,
            'penjab'=>$ybs,
            'admin'=>$admmin
        ]);
        if($data){
            $print=['msg'=>'Data Berhasil disimpan'];
        }else{
            $print=['msg'=>'Data Gagal disimpan'];
        }
        return response()->json($print);
    }
    function delpengeluaran($id){
        $del=MPengeluaran::where('id',$id)->delete();
        if($del){
            $print=['msg'=>'Data Berhasil dihapus'];
        }else{
            $print=['msg'=>'Data Gagal dihapus'];
        }
        return response()->json($print);
    }
    function caripengeluaran($dt1,$dt2){
        $data=MPengeluaran::whereBetween('tgl',[$dt1,$dt2])->get();
        if($data){
            $print=['data'=>$data];
        }
        return response()->json($print);
    }
    // lap trx
    function laptrx(){
        $aks=$this->rl->getAkses();       
        $arr=[
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.laporan.lap_trx',$mer);
    }
    // lap stok
    function lapstok(){
        $aks=$this->rl->getAkses();       
        $arr=[
        ];
        $mer=array_merge($aks, $arr);
        return view('admin.laporan.lap_stok',$mer);
    }
}
