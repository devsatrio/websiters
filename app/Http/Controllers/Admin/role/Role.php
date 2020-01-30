<?php

namespace App\Http\Controllers\Admin\role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin;
use App\Model\Mrole;
use App\Model\Menus;
use App\Model\Moduls;
use App\lib\setRole;

class Role extends Controller
{
    protected $rl;
    protected $drl;
    protected $bl;
    protected $dt;
    protected $lap;
    protected $st;
    protected $trx;
    protected $dmn;
    protected $dus;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->rl=new setRole();
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
        $user='user';

        // Set Roles
        $this->drl=$this->rl->sRole($idr, $role);
        $this->bl=$this->rl->sRole($idr, $bl);
        $this->dt=$this->rl->sRole($idr, $dt);
        $this->lap=$this->rl->sRole($idr, $lap);
        $this->st=$this->rl->sRole($idr, $st);
        $this->trx=$this->rl->sRole($idr, $trx);
        $this->dus=$this->rl->sRole($idr, $user);

        $akses=array(
            'drl'=>$this->drl,
            'bl'=>$this->bl,
            'dt'=>$this->dt,
            'lap'=>$this->lap,
            'st'=>$this->st,
            'trx'=>$this->trx,
            'dus'=>$this->dus,
        );
        return $akses;
    }
    public function index()
    {
        
        $role=DB::table('mroles')
        ->get();
        $admin=DB::table('admins')
            ->select(DB::raw('admins.*,mroles.role,mroles.id as idr'))
            ->leftjoin('mroles', 'mroles.id', '=', 'admins.idroles')
            ->get();
        $menus=Menus::all();
        $modul=DB::table('moduls')
            ->get();
        $aks=$this->getAkses();
        $arr=[
        'role'=>$role,
        'admin'=>$admin,
        'modul'=>$modul,
        'menu'=>$menus];
        $mer=array_merge($aks, $arr);

        if ($this->drl->view=='y') {
            return view('admin.user.index',$mer);
        } else {
            return view('error.404', [
                'drl'=>$this->drl,
            ]);
        }
    }
    public function adduser(Request $request)
    {
        $check=[
            'email'=>'required|email',
            'nama'=>'required',
            'password'=>'required',
            'role'=>'required'
        ];
        $request->filled('remember');
        $this->validate($request, $check);
        $nama=$request->nama;
        $email=$request->email;
        $password=$request->password;
        $role=$request->role;
        $simpan=Admin::create([
            'nama'=>$nama,
            'email'=>$email,
            'password'=>Hash::make($password),
            'idroles'=>$role,
        ]);
        if ($simpan) {
            return redirect()->route('role')->with('msg', 'Data Admin Berhasil Disimpan');
        } else {
            return redirect()->route('role')->with('msg', 'Data Admin Gagal Disimpan');
        }
    }
    public function updateuser(Request $request)
    {
        $check=[
            'email'=>'required|email',
            'nama'=>'required',
            'role'=>'required'
        ];
        $request->filled('remember');
        $this->validate($request, $check);
        $id=$request->id;
        $nama=$request->nama;
        $email=$request->email;
        $password=$request->password;
        $role=$request->role;
        if (empty($password)) {
            $simpan=Admin::where('id', $id)->update([
                'nama'=>$nama,
                'email'=>$email,
                'idroles'=>$role,
            ]);
        } else {
            $simpan=Admin::where('id', $id)->update([
                'nama'=>$nama,
                'email'=>$email,
                'password'=>Hash::make($password),
                'idroles'=>$role,
            ]);
        }
        if ($simpan) {
            return redirect()->route('role')->with('msg', 'Data Admin Berhasil Disimpan');
        } else {
            return redirect()->route('role')->with('msg', 'Data Admin Gagal Disimpan');
        }
    }
    public function deleteuser($id, $token)
    {
        $tkn=csrf_token();
        if ($tkn==$token) {
            $delete=Admin::where('id', $id)->delete();
            if ($delete) {
                return redirect()->route('role')->with('msg', 'Data Admin Berhasil Dihapus');
            } else {
                return redirect()->route('role')->with('msg', 'Data Admin Gagal Dihapus');
            }
        } else {
            return redirect()->route('role')->with('msg', 'Data Admin Gagal Dihapus');
        }
    }
    public function addrole(Request $request)
    {
        $check=[
            'role'=>'required',
        ];
        $this->validate($request, $check);
        $role=$request->role;
        $simpan=MRole::create([
            'role'=>$role
        ]);
        if ($simpan) {
            return redirect()->route('role')->with('msg', 'Data Role Berhasil Disimpan');
        } else {
            return redirect()->route('role')->with('msg', 'Data Role Gagal Disimpan');
        }
    }
    public function updaterole(Request $request)
    {
        $check=[
            'role'=>'required',
        ];
        $this->validate($request, $check);
        $role=$request->role;
        $id=$request->id;
        $simpan=MRole::where('id', $id)->update([
            'role'=>$role
        ]);
        if ($simpan) {
            return redirect()->route('role')->with('msg', 'Data Role Berhasil Disimpan');
        } else {
            return redirect()->route('role')->with('msg', 'Data Role Gagal Disimpan');
        }
    }
    public function deleterole($id, $token)
    {
        $tkn=csrf_token();
        if ($tkn==$token) {
            $delete=MRole::where('id', $id)->delete();
            if ($delete) {
                return redirect()->route('role')->with('msg', 'Data Role Berhasil Dihapus');
            } else {
                return redirect()->route('role')->with('msg', 'Data Role Gagal Dihapus');
            }
        } else {
            return redirect()->route('role')->with('msg', 'Data Role Gagal Dihapus');
        }
    }
    public function addmodul(Request $request)
    {
        $check=[
            'role'=>'required',
            'modul'=>'required',
        ];
        $this->validate($request, $check);
        $rol=$request->role;
        $modul=$request->modul;
        $y1='';
        $y2='';
        $y3='';
        $y4='';
        $v=$request->v;
        $c=$request->c;
        $u=$request->u;
        $d=$request->d;
        if ($v=="on") {
            $y1='y';
        } else {
            $y1='n';
        }
        if ($c=="on") {
            $y2='y';
        } else {
            $y2='n';
        }
        if ($u=="on") {
            $y3='y';
        } else {
            $y3='n';
        }
        if ($d=="on") {
            $y4='y';
        } else {
            $y4='n';
        }
        // Simpan Di Modul dan menu
        $modul=Moduls::create([
            'idrole'=>$rol,
            'idmodul'=>$modul,
            'view'=>$y1,
            'c'=>$y2,
            'r'=>$y1,
            'u'=>$y3,
            'd'=>$y4,
        ]);
        if ($modul) {
            return redirect()->route('role')->with('msg', 'Data Berhasil Disimpan');
        } else {
            return redirect()->route('role')->with('msg', 'Data Gagal Disimpan');
        }
    }
    public function updatemodul(Request $request)
    {
        $idr=$request->idr;
        $idm=$request->idm;
        $y1='';
        $y2='';
        $y3='';
        $y4='';
        $c1=$request->c1;
        $c2=$request->c2;
        $c3=$request->c3;
        $c4=$request->c4;
        if ($c1=='on') {
            $y1='y';
        } else {
            $y1='n';
        }
        if ($c2=='on') {
            $y2='y';
        } else {
            $y2='n';
        }
        if ($c3=='on') {
            $y3='y';
        } else {
            $y3='n';
        }
        if ($c4=='on') {
            $y4='y';
        } else {
            $y4='n';
        }
        // simpan Update
        $data=Moduls::where(['idrole'=>$idr,'idmodul'=>$idm])->update([
            'view'=>$y1,
            'c'=>$y2,
            'r'=>$y1,
            'u'=>$y3,
            'd'=>$y4,
        ]);
        if ($data) {
            return redirect()->route('role')->with('msg', 'Berhasil disimpan');
        } else {
            return redirect()->route('role')->with('msg', 'Gagal disimpan');
        }
    }
}
