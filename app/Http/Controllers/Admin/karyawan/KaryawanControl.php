<?php

namespace App\Http\Controllers\Admin\karyawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\lib\setRole;
use App\Model\Karyawan;

class KaryawanControl extends Controller
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
        $data = Karyawan::orderBy('id', 'DESC')->paginate(15);
        $aks=$this->getAkses();
        $arr=['data' => $data];
        $mer=array_merge($aks, $arr);
        return view('admin.karyawan.index',$mer);
    }
    function simpan(Request $request)
    {
        $rul = [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'kec' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'username' => 'required',
            'password' => 'required',
            'st' => 'required',
            'masuk' => 'required',
            'kontrak' => 'required',
            'akhir' => 'required',
        ];
        $this->validate($request, $rul);
        // simpan 
        $nip = $request->nip;
        $nama = $request->nama;
        $telp = $request->telp;
        $al = $request->alamat;
        $kec = $request->kec;
        $kota = $request->kota;
        $prov = $request->provinsi;
        $user = $request->username;
        $pass = Hash::make($request->password);
        $st = $request->st;
        $ms = $request->masuk;
        $kn = $request->kontrak;
        $ak = $request->akhir;
        $save = Karyawan::create([
            'nip' => $nip,
            'nama' => $nama,
            'telp' => $telp,
            'alamat' => $al,
            'kecamatan' => $kec,
            'kot_kab' => $kota,
            'provinsi' => $prov,
            'username' => $user,
            'password' => $pass,
            'status' => $st,
            'tgl_masuk' => $ms,
            'tgl_kotrak' => $kn,
            'tgl_kotrak_habis' => $ak,
        ]);
        if ($save) {
            return redirect()->route('karyawan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('karyawan')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function update(Request $request)
    {
        $rul = [
            'nip' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'kec' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'username' => 'required',
            'st' => 'required',
            'masuk' => 'required',
            'kontrak' => 'required',
            'akhir' => 'required',
        ];
        $this->validate($request, $rul);
        // simpan 
        $nip = $request->nip;
        $nama = $request->nama;
        $telp = $request->telp;
        $al = $request->alamat;
        $kec = $request->kec;
        $kota = $request->kota;
        $prov = $request->provinsi;
        $user = $request->username;
        $pass = Hash::make($request->password);
        $st = $request->st;
        $ms = $request->masuk;
        $kn = $request->kontrak;
        $ak = $request->akhir;
        $id = $request->id;
        if (empty($pass)) {
            $save = Karyawan::where('id', $id)->update([
                'nip' => $nip,
                'nama' => $nama,
                'telp' => $telp,
                'alamat' => $al,
                'kecamatan' => $kec,
                'kot_kab' => $kota,
                'provinsi' => $prov,
                'username' => $user,
                'status' => $st,
                'tgl_masuk' => $ms,
                'tgl_kotrak' => $kn,
                'tgl_kotrak_habis' => $ak,
            ]);
        } else {
            $save = Karyawan::where('id', $id)->update([
                'nip' => $nip,
                'nama' => $nama,
                'telp' => $telp,
                'alamat' => $al,
                'kecamatan' => $kec,
                'kot_kab' => $kota,
                'provinsi' => $prov,
                'username' => $user,
                'password' => $pass,
                'status' => $st,
                'tgl_masuk' => $ms,
                'tgl_kotrak' => $kn,
                'tgl_kotrak_habis' => $ak,
            ]);
        }

        if ($save) {
            return redirect()->route('karyawan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('karyawan')->with('msg', 'Data Gagal Disimpan');
        }
    }
    function hapus($id,$token){
        $tk=csrf_token();
        if($token==$tk){
            $del=Karyawan::where('id',$id)->delete();
        }
        if($del){
            return redirect()->route('karyawan')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('karyawan')->with('msg', 'Data Gagal Disimpan');
        }
    }
}
