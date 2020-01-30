<?php

namespace App\Http\Controllers\Admin\barang;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\lib\setRole;
use App\Model\Barang;
use App\Model\BarangKategori;
use App\Model\ImgBarang;
use App\Model\Pakan;

class BarangControl extends Controller
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
     
        $data = Barang::join('barang_kategoris', 'barang_kategoris.id', '=', 'barangs.idk')->select(DB::raw('barangs.*,barang_kategoris.*,barangs.id as idb'))->paginate(20);
        $ka = BarangKategori::all();
        $aks=$this->getAkses();
        $arr=['data' => $data,'kat' => $ka,];
        $mer=array_merge($aks, $arr);
        return view('admin.barang.index',$mer);
    }
    function addkategori(Request $request)
    {
        $rul = [
            'nama' => 'required',
            'isi' => 'required',
            'pak' => 'required',
            'berat' => 'required',
        ];
        $this->validate($request, $rul);
        $nm = $request->nama;
        $isi = $request->isi;
        $pak = $request->pak;
        $brt = $request->berat;
        $save = BarangKategori::create([
            'kategori' => $nm,
            'isi' => $isi,
            'paket' => $pak,
            'jenis_berat' => $brt,
        ]);
        if ($save) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function updatekategori(Request $request)
    {
        $rul = [
            'nama' => 'required',
            'isi' => 'required',
            'pak' => 'required',
            'berat' => 'required',
        ];
        $this->validate($request, $rul);
        $nm = $request->nama;
        $isi = $request->isi;
        $pak = $request->pak;
        $brt = $request->berat;
        $id = $request->id;
        $save = BarangKategori::where('id', $id)->update([
            'kategori' => $nm,
            'isi' => $isi,
            'paket' => $pak,
            'jenis_berat' => $brt,
        ]);
        if ($save) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function delkategori($id, $token)
    {
        $del = BarangKategori::where('id', $id)->delete();
        if ($del) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function addproduk(Request $request)
    {
        $path = public_path('produk_img/');
        $rul = [
            'produk' => 'required',
            'kode' => 'required',
            'kat' => 'required',
            'stok' => 'required',
            'hrgpcs' => 'required',
            'hrgpack' => 'required',
            'diskon' => 'required',
            'deskripsi' => 'required',
            'unggul' => 'required',
            'kegunaan' => 'required',
            'imgs.*' => 'image|mimes:jpeg,jpg,png|max:5048',
        ];
        $cus = [
            'required' => 'Maaf, :attribute Harus Diisi'
        ];
        $this->validate($request, $rul, $cus);
        // check image               
        $kode = $request->kode;
        $prod = $request->produk;
        $kat = $request->kat;
        $stok = $request->stok;
        $hrgpcs = str_replace(',', '', $request->hrgpcs);
        $hrgpack = str_replace(',', '', $request->hrgpack);
        $disk = $request->diskon;
        $desk = $request->deskripsi;
        $ung = $request->unggul;
        $guna = $request->kegunaan;
        
        if ($request->hasFile('photos1') || $request->hasFile('photos2') || $request->hasFile('photos3')) {
            // // simpan barang
            $saveProd = Barang::create([
                'idk' => $kat,
                'kode' => $kode,
                'produk' => $prod,
                'deskripsi' => $desk,
                'keunggulan' => $ung,
                'penggunaan' => $guna,
                'harg_pcs' => $hrgpcs,
                'harg_pack' => $hrgpack,
                'stok' => $stok,
                'diskon' => $disk,
            ]);
            $idb = $saveProd->id;
            $p1 = date('Ymd').$request->file('photos1')->getClientOriginalName();
            $p2 = date('Ymd').$request->file('photos2')->getClientOriginalName();
            $p3 = date('Ymd').$request->file('photos3')->getClientOriginalName();
            $request->file('photos1')->move($path, $p1);
            $request->file('photos2')->move($path, $p2);
            $request->file('photos3')->move($path, $p3);
            // simpan ke foto produk 
            for ($i = 1; $i < 4; $i++) {
                $saveimg = ImgBarang::create([
                    'idb' => $idb,
                    'nama' =>date('Ymd').$request->file('photos' . $i)->getClientOriginalName(),
                ]);
            }
        }
        if ($saveProd) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function updateproduk(Request $request)
    {
        $rul = [
            'produk' => 'required',
            'kode' => 'required',
            'kat' => 'required',
            'stok' => 'required',
            'hrgpcs' => 'required',
            'hrgpack' => 'required',
            'diskon' => 'required',
            'deskripsi' => 'required',
            'unggul' => 'required',
            'kegunaan' => 'required',
            'imgs.*' => 'image|mimes:jpeg,jpg,png|max:2048',
        ];
        $cus = [
            'required' => 'Maaf, :attribute Harus Diisi'
        ];
        $this->validate($request, $rul, $cus);
        $id = $request->id;
        $kode = $request->kode;
        $prod = $request->produk;
        $kat = $request->kat;
        $stok = $request->stok;
        $hrgpcs = str_replace(',', '', $request->hrgpcs);
        $hrgpack = str_replace(',', '', $request->hrgpack);
        $disk = $request->diskon;
        $desk = $request->deskripsi;
        $ung = $request->unggul;
        $guna = $request->kegunaan;
        // // simpan barang
        $saveProd = Barang::where('id', $id)->update([
            'idk' => $kat,
            'kode' => $kode,
            'produk' => $prod,
            'deskripsi' => $desk,
            'keunggulan' => $ung,
            'penggunaan' => $guna,
            'harg_pcs' => $hrgpcs,
            'harg_pack' => $hrgpack,
            'stok' => $stok,
            'diskon' => $disk,
        ]);
        if ($saveProd) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function upfoto(Request $request){
        $path = public_path('produk_img/');
        $idb=$request->idb;   
        if ($request->hasFile('photos1') || $request->hasFile('photos2') || $request->hasFile('photos3')) {
            $p1 = date('Ymd').$request->file('photos1')->getClientOriginalName();
            $p2 = date('Ymd').$request->file('photos2')->getClientOriginalName();
            $p3 = date('Ymd').$request->file('photos3')->getClientOriginalName();
            $request->file('photos1')->move($path, $p1);
            $request->file('photos2')->move($path, $p2);
            $request->file('photos3')->move($path, $p3);
            // del Barang
            $imgb=ImgBarang::where('idb',$idb)->get();
            foreach($imgb as $im){
                if(File::exists($path.$im->nama)){
                    File::delete($path.$im->nama);
                }
            }
            ImgBarang::where('idb',$idb)->delete();
            // simpan ke foto produk 
            for ($i = 1; $i < 4; $i++) {
                $saveimg = ImgBarang::create([
                    'idb'=>$idb,
                    'nama' => date('Ymd').$request->file('photos' . $i)->getClientOriginalName(),
                ]);
            }
        }
        if ($saveimg) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function addprodukstok(Request $request)
    {
        $rul = [
            'stok' => 'required',
        ];
        $cus = [
            'required' => 'Maaf, :attribute Harus Diisi',
        ];
        $idb = $request->id;
        $jum = $request->stok;
        $pil = $request->pil;
        $this->validate($request, $rul, $cus);
        if ($pil == '1') {
            $up = DB::update('update barangs set stok=stok+? where id=?', [$jum, $idb]);
        } else {
            $up = DB::update('update barangs set stok=stok-? where id=?', [$jum, $idb]);
        }
        if ($up) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function delproduk($id, $token)
    {
        $del = Barang::where('id', $id)->delete();
        if ($del) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    // Baris Pakan
    function indexpakan(){
        $data = Pakan::join('barang_kategoris', 'barang_kategoris.id', '=', 'pakans.idk')->select(DB::raw('pakans.*,barang_kategoris.*,pakans.id as idb'))->paginate(20);      
        $aks=$this->getAkses();
        $ka = BarangKategori::all();
        $arr=['data' => $data,'kat' => $ka];
        $mer=array_merge($aks, $arr);
        return view('admin.pakan.index',$mer);
    }
    function addpakan(Request $request){
        $path = public_path('produk_img/');
        $rul = [
            'produk' => 'required',
            'kode' => 'required',
            'kat' => 'required',
            'stok' => 'required',
            'hrgpcs' => 'required',
            'hrgpack' => 'required',
            'diskon' => 'required',
            'deskripsi' => 'required',
            'unggul' => 'required',
            'kegunaan' => 'required',
            'imgs.*' => 'image|mimes:jpeg,jpg,png|max:5048',
        ];
        $cus = [
            'required' => 'Maaf, :attribute Harus Diisi'
        ];
        $this->validate($request, $rul, $cus);
        // check image               
        $kode = $request->kode;
        $prod = $request->produk;
        $kat = $request->kat;
        $stok = $request->stok;
        $hrgpcs = str_replace(',', '', $request->hrgpcs);
        $hrgpack = str_replace(',', '', $request->hrgpack);
        $disk = $request->diskon;
        $desk = $request->deskripsi;
        $ung = $request->unggul;
        $guna = $request->kegunaan;
        
        if ($request->hasFile('photos1') || $request->hasFile('photos2') || $request->hasFile('photos3')) {
            // // simpan barang
            $saveProd = Pakan::create([
                'idk' => $kat,
                'kode' => $kode,
                'produk' => $prod,
                'deskripsi' => $desk,
                'keunggulan' => $ung,
                'penggunaan' => $guna,
                'harg_kg' => $hrgpcs,
                'harg_ton' => $hrgpack,
                'stok' => $stok,
                'diskon' => $disk,
            ]);
            $idb = $saveProd->id;
            $p1 = date('Ymd').$request->file('photos1')->getClientOriginalName();
            $p2 = date('Ymd').$request->file('photos2')->getClientOriginalName();
            $p3 = date('Ymd').$request->file('photos3')->getClientOriginalName();
            $request->file('photos1')->move($path, $p1);
            $request->file('photos2')->move($path, $p2);
            $request->file('photos3')->move($path, $p3);
            // simpan ke foto produk 
            for ($i = 1; $i < 4; $i++) {
                $saveimg = ImgBarang::create([
                    'idb' => $idb,
                    'nama' =>date('Ymd').$request->file('photos' . $i)->getClientOriginalName(),
                ]);
            }
        }
        if ($saveProd) {
            return redirect()->route('pakan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('pakan')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function updatepakan(Request $request){
        $rul = [
            'produk' => 'required',
            'kode' => 'required',
            'kat' => 'required',
            'stok' => 'required',
            'hrgpcs' => 'required',
            'hrgpack' => 'required',
            'diskon' => 'required',
            'deskripsi' => 'required',
            'unggul' => 'required',
            'kegunaan' => 'required',
            'imgs.*' => 'image|mimes:jpeg,jpg,png|max:2048',
        ];
        $cus = [
            'required' => 'Maaf, :attribute Harus Diisi'
        ];
        $this->validate($request, $rul, $cus);
        $id = $request->id;
        $kode = $request->kode;
        $prod = $request->produk;
        $kat = $request->kat;
        $stok = $request->stok;
        $hrgpcs = str_replace(',', '', $request->hrgpcs);
        $hrgpack = str_replace(',', '', $request->hrgpack);
        $disk = $request->diskon;
        $desk = $request->deskripsi;
        $ung = $request->unggul;
        $guna = $request->kegunaan;
        // // simpan Pakan
        $saveProd = Pakan::where('id', $id)->update([
            'idk' => $kat,
            'kode' => $kode,
            'produk' => $prod,
            'deskripsi' => $desk,
            'keunggulan' => $ung,
            'penggunaan' => $guna,
            'harg_kg' => $hrgpcs,
            'harg_ton' => $hrgpack,
            'stok' => $stok,
            'diskon' => $disk,
        ]);
        if ($saveProd) {
            return redirect()->route('pakan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('pakan')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function delpakan($id,$token){
        $del = Pakan::where('id', $id)->delete();
        if ($del) {
            return redirect()->route('pakan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('pakan')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function upfotopakan(Request $request){
        $path = public_path('produk_img/');
        $idb=$request->idb;   
        if ($request->hasFile('photos1') || $request->hasFile('photos2') || $request->hasFile('photos3')) {
            $p1 = date('Ymd').$request->file('photos1')->getClientOriginalName();
            $p2 = date('Ymd').$request->file('photos2')->getClientOriginalName();
            $p3 = date('Ymd').$request->file('photos3')->getClientOriginalName();
            $request->file('photos1')->move($path, $p1);
            $request->file('photos2')->move($path, $p2);
            $request->file('photos3')->move($path, $p3);
            // del Barang
            $imgb=ImgBarang::where('idb',$idb)->get();
            foreach($imgb as $im){
                if(File::exists($path.$im->nama)){
                    File::delete($path.$im->nama);
                }
            }
            ImgBarang::where('idb',$idb)->delete();
            // simpan ke foto produk 
            for ($i = 1; $i < 4; $i++) {
                $saveimg = ImgBarang::create([
                    'idb'=>$idb,
                    'nama' => date('Ymd').$request->file('photos' . $i)->getClientOriginalName(),
                ]);
            }
        }
        if ($saveimg) {
            return redirect()->route('katalog')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('katalog')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function addpakanstok(Request $request){
        $rul = [
            'stok' => 'required',
        ];
        $cus = [
            'required' => 'Maaf, :attribute Harus Diisi',
        ];
        $idb = $request->id;
        $jum = $request->stok;
        $pil = $request->pil;
        $this->validate($request, $rul, $cus);
        if ($pil == '1') {
            $up = DB::update('update pakans set stok=stok+? where id=?', [$jum, $idb]);
        } else {
            $up = DB::update('update pakans set stok=stok-? where id=?', [$jum, $idb]);
        }
        if ($up) {
            return redirect()->route('pakan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('pakan')->with('msg', 'Data Gagal Disimpan');
        }
    }
}
