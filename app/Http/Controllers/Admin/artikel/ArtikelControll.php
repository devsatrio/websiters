<?php

namespace App\Http\Controllers\Admin\artikel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\lib\setRole;
use App\Model\Artikel;
use App\Model\kategori;
use App\Model\SubKategori;

class ArtikelControll extends Controller
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
    public function index()
    {
        // dd($this->getAkses());
        $data = Artikel::leftjoin('sub_kategoris', 'sub_kategoris.id', '=', 'artikels.idsk')
            ->select(DB::raw('artikels.*,sub_kategoris.subkategori,kategoris.kategori'))
            ->leftjoin('kategoris', 'sub_kategoris.idk', '=', 'kategoris.id')
            ->orderBy('artikels.id', 'DESC')
            ->paginate(15);
        $sk = SubKategori::join('kategoris', 'kategoris.id', '=', 'sub_kategoris.idk')
            ->select(DB::raw('kategoris.kategori,sub_kategoris.*'))
            ->get();

        $aks=$this->getAkses();
        $arr=['data' => $data,'sk' => $sk,];
        $mer=array_merge($aks, $arr);
        return view('admin.artikel.index', $mer);
    }
    public function add()
    {
        $sk = SubKategori::join('kategoris', 'kategoris.id', '=', 'sub_kategoris.idk')
            ->select(DB::raw('kategoris.kategori,sub_kategoris.*'))
            ->get();
        $aks=$this->getAkses();
        $arr=['sk' => $sk,];
        $mer=array_merge($aks, $arr);
        return view('admin.artikel.add', $mer);
    }
    public function kategori()
    {
        //
        $kat = Kategori::all();
        $sk = SubKategori::join('kategoris', 'kategoris.id', '=', 'sub_kategoris.idk')
            ->select(DB::raw('kategoris.kategori,sub_kategoris.*'))
            ->get();
        $aks=$this->getAkses();
        $arr=[ 'kat' => $kat,'sk' => $sk,];
        $mer=array_merge($aks, $arr);
        return view('admin.artikel.kategori',$mer);
    }
    public function kategoriadd(Request $request)
    {
        $rul = ['kategori' => 'required'];
        $this->validate($request, $rul);
        $kt = $request->kategori;
        $simpan = Kategori::create([
            'kategori' => $kt,
        ]);
        if ($simpan) {
            return redirect()->route('kategori')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('kategori')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function kategoridelete($id, $token)
    {
        $del = Kategori::where('id', $id)->delete();
        if ($del) {
            return redirect()->route('kategori')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('kategori')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function kategoriupdate(Request $request)
    {
        $rul = ['kategori' => 'required', 'id' => 'required'];
        $this->validate($request, $rul);
        $id = $request->id;
        $kt = $request->kategori;
        $simpan = Kategori::where('id', $id)->update([
            'kategori' => $kt,
        ]);
        if ($simpan) {
            return redirect()->route('kategori')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('kategori')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function subkategoriadd(Request $request)
    {
        $rul = [
            'subkategori' => 'required',
            'kat' => 'required',
        ];
        $this->validate($request, $rul);
        $kt = $request->subkategori;
        $sk = $request->kat;
        $simpan = SubKategori::create([
            'subkategori' => $kt,
            'idk' => $sk,
        ]);
        if ($simpan) {
            return redirect()->route('kategori')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('kategori')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function subkategoriupdate(Request $request)
    {
        $rul = [
            'subkategori' => 'required',
            'kat' => 'required',
            'id' => 'required'
        ];
        $this->validate($request, $rul);
        $kt = $request->subkategori;
        $sk = $request->kat;
        $id = $request->id;
        $simpan = SubKategori::where('id', $id)->update([
            'subkategori' => $kt,
            'idk' => $sk,
        ]);
        if ($simpan) {
            return redirect()->route('kategori')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('kategori')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function subkategoridelete($id, $token)
    {
        $del = SubKategori::where('id', $id)->delete();
        if ($del) {
            return redirect()->route('kategori')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('kategori')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function addartikel(Request $request)
    {
        $path = public_path('thumbs/sampul');
        $rul = [
            'judul' => 'required',
            'tgl' => 'required',
            'subk' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required',
            'isi' => 'required',
        ];
        $this->validate($request, $rul);
        if ($request->hasFile('img')) {
            $jd = $request->judul;
            $url=str_replace(' ', '-', $jd);
            $tgl = $request->tgl;
            $sk = $request->subk;
            $img = $request->file('img');
            $imfr=date('Y-m-d') . '-' . $img->getClientOriginalName();
            $imname = str_replace(' ', '-', $imfr);
            $img->move($path, $imname);
            $desk = $request->deskripsi;
            $isi = $request->isi;
            // Masukan Data
            $data = Artikel::create([
                'judul' => $jd,
                'link'=>$url,
                'tgl' => $tgl,
                'idsk' => $sk,
                'foto' => $imname,
                'deskripsi' => $desk,
                'isi' => $isi,
                'admin' => Auth::user()->id,
            ]);
            if ($data) {
                return redirect()->route('artikel.add')->with('msg', 'Berhasil Disimpan');
            } else {
                return redirect()->route('artikel.add')->with('msg', 'Gagal Disimpan');
            }
        }
    }
    public function updateartikel(Request $request)
    {
        $path = public_path('thumbs/sampul');
        $rul = [
            'judul' => 'required',
            'tgl' => 'required',
            'subk' => 'required',
            'deskripsi' => 'required',
            'isi' => 'required',
        ];
        $this->validate($request, $rul);
        $id = $request->id;
        $jd = $request->judul;
        $url=str_replace(' ', '-', $jd);
        $tgl = $request->tgl;
        $sk = $request->subk;
        $desk = $request->deskripsi;
        $isi = $request->isi;

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $imfr=date('Y-m-d') . '-' . $img->getClientOriginalName();
            $imname = str_replace(' ', '-', $imfr);
            $img->move($path, $imname);
            // Masukan Data
            $data = Artikel::where('id', $id)->update([
                'judul' => $jd,
                'link'=>$url,
                'tgl' => $tgl,
                'idsk' => $sk,
                'foto' => $imname,
                'deskripsi' => $desk,
                'isi' => $isi,
                'admin' => Auth::user()->id,
            ]);
            if ($data) {
                return redirect()->route('artikel')->with('msg', 'Berhasil Disimpan');
            } else {
                return redirect()->route('artikel')->with('msg', 'Gagal Disimpan');
            }
        } else {
            $data = Artikel::where('id', $id)->update([
                'judul' => $jd,
                'link'=>$url,
                'tgl' => $tgl,
                'idsk' => $sk,
                'deskripsi' => $desk,
                'isi' => $isi,
                'admin' => Auth::user()->id,
            ]);
            if ($data) {
                return redirect()->route('artikel')->with('msg', 'Berhasil Disimpan');
            } else {
                return redirect()->route('artikel')->with('msg', 'Gagal Disimpan');
            }
        }
    }
    public function artikeldelete($id, $token)
    {
        $del = Artikel::where('id', $id)
            ->delete();
        if ($del) {
            return redirect()->route('artikel')->with('msg', 'Berhasil Disimpan');
        } else {
            return redirect()->route('artikel')->with('msg', 'Gagal Disimpan');
        }
    }
    public function artikellock($id, $a)
    {
        $data = Artikel::where('id', $id)->update(['aktif' => $a]);
        if ($data) {
            return redirect()->route('artikel')->with('msg', 'Berhasil Disimpan');
        } else {
            return redirect()->route('artikel')->with('msg', 'Gagal Disimpan');
        }
    }
}
