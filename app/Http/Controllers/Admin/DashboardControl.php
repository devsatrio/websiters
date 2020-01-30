<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Model\Admin;
use App\lib\setRole;
use App\Model\Artikel;
class DashboardControl extends Controller
{
    protected $rl;
    protected $drl;
    protected $bl;
    protected $dt;
    protected $lap;
    protected $st;
    protected $trx;

    public function __construct(){
        $this->middleware('auth:admin');
        $this->rl=new setRole();
    }
    function index(){
        $idr=Auth::user()->idroles;
        $role="Role";
        $bl="blog";
        $dt="data";
        $lap="laporan";
        $st="setting";
        $trx="transaksi";

        // Set Roles
        $this->drl=$this->rl->sRole($idr,$role);
        $this->bl=$this->rl->sRole($idr,$bl);
        $this->dt=$this->rl->sRole($idr,$dt);
        $this->lap=$this->rl->sRole($idr,$lap);
        $this->st=$this->rl->sRole($idr,$st);
        $this->trx=$this->rl->sRole($idr,$trx);
        
        $ar=Artikel::all();
        return view('admin.dashboard.index',[
            'drl'=>$this->drl,
            'bl'=>$this->bl,
            'dt'=>$this->dt,
            'lap'=>$this->lap,
            'st'=>$this->st,
            'trx'=>$this->trx,
            'ar'=>$ar
        ]);
    }
}
