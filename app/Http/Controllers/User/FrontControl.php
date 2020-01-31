<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\lib\setSetting;
use App\Model\Slider;
use App\Model\kategori;
use App\Model\Artikel;
use App\Model\Galeri;
use App\Model\Vidtube;
use App\Model\Barang;
use App\Model\SubKategori;

class FrontControl extends Controller
{
    protected $set;
    function __construct(){
        $this->set=new setSetting();        
    }
    function galeri(){
        $st=$this->set->setting();
        $menu=kategori::all();
        $gal=Galeri::orderby('id','desc')->paginate(16);
        return view('frontend.galeri',['st'=>$st,'kt'=>$menu,'gal'=>$gal]);
    }

    function index(){
        $st=$this->set->setting();
        $slide=Slider::where('aktif','y')->get();
        $menu=kategori::all();
        $art=Artikel::where('aktif','y')->orderBy('id','DESC')->paginate('10');
        $gal=Galeri::inRandomOrder()->limit(8)->get();
        $vid=Vidtube::inRandomOrder()->limit(3)->get();
        $prod=Barang::join('barang_kategoris','barang_kategoris.id','=','barangs.idk')->select(DB::raw('barangs.id as idb, barangs.*,barang_kategoris.*'))->inRandomOrder()->get();
        return view('frontend.index',['st'=>$st,'sl'=>$slide,'kt'=>$menu,'art'=>$art,'gal'=>$gal,'vid'=>$vid,'prod'=>$prod]);
    }

    function detailproduk($id){
        $data = Barang::join('barang_kategoris', 'barang_kategoris.id', '=', 'barangs.idk')->select(DB::raw('barangs.*,barang_kategoris.*,barangs.id as idb'))->where('kode',$id)->first();        
        $prod=Barang::join('barang_kategoris','barang_kategoris.id','=','barangs.idk')->select(DB::raw('barangs.id as idb, barangs.*,barang_kategoris.*'))->inRandomOrder()->limit(6)->get();
        $st=$this->set->setting();
        $menu=kategori::all();
        return view('frontend.detail_produk',['st'=>$st,'prod'=>$data,'kt'=>$menu,'rpd'=>$prod]);
    }

    function artikel($url){
        $st=$this->set->setting();
        $menu=kategori::all();
        $data = Artikel::join('sub_kategoris', 'sub_kategoris.id', '=', 'artikels.idsk')
        ->leftjoin('admins','admins.id','=','artikels.admin')
        ->select(DB::raw('admins.nama,artikels.*,sub_kategoris.*,artikels.id as idar'))
        ->where('link',$url)
        ->first();
        $vid=Vidtube::inRandomOrder()->limit(2)->get();
        $gal=Galeri::inRandomOrder()->limit(2)->get();
        // add counter
        Artikel::where('link',$url)
        ->increment('counter');
        
        $ar=Artikel::leftjoin('sub_kategoris', 'sub_kategoris.id', '=', 'artikels.idsk')
        ->leftjoin('admins','admins.id','=','artikels.admin')
        ->select(DB::raw('admins.nama,artikels.*,sub_kategoris.*,artikels.id as idar'))
        ->inRandomOrder()
        ->limit(3)
        ->get();
        return view('frontend.detail_info',['vid'=>$vid,'gal'=>$gal,'ar'=>$data,'st'=>$st,'kt'=>$menu,'de'=>$ar]);
    }

    function subkategori($sk){
        $st=$this->set->setting();
        $menu=kategori::all();
        $skt=str_replace('_',' ',$sk);
        $subk=SubKategori::where('subkategori',$skt)->first();
        $kategori = kategori::find($subk->idk);
        $submenu = subkategori::where('idk',$kategori->id)->get();
        $ids=$subk->id;
        $sub=Artikel::where('idsk',$ids)->orderBy('id','DESC')->paginate(10);
        $artikel_lain=Artikel::inRandomOrder()->limit(3)->get();
        $vid=Vidtube::inRandomOrder()->limit(2)->get();
        $gal=Galeri::inRandomOrder()->limit(2)->get();
        return view('frontend.detail_menu',['artikel_lain'=>$artikel_lain,'submenu'=>$submenu,'kategori'=>$kategori,'gal'=>$gal,'vid'=>$vid,'st'=>$st,'kt'=>$menu,'sub'=>$sub]);    
    }
}
