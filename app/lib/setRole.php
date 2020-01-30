<?php 
namespace App\lib;
use App\Model\Moduls;
use App\Model\Menus;
use Illuminate\Support\Facades\Auth;
class setRole{
    protected $rl;
    protected $drl;
    protected $bl;
    protected $dt;
    protected $lap;
    protected $st;
    protected $trx;

    function sRole($idr,$menu){
        // ambil id menus
        $menu=Menus::where(['menu'=>$menu])->first();
        $idm=$menu->id;
        $role=Moduls::where(['idrole'=>$idr,'idmodul'=>$idm])->first();
        return $role;
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
        $this->drl=$this->sRole($idr, $role);
        $this->bl=$this->sRole($idr, $bl);
        $this->dt=$this->sRole($idr, $dt);
        $this->lap=$this->sRole($idr, $lap);
        $this->st=$this->sRole($idr, $st);
        $this->trx=$this->sRole($idr, $trx);

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
}
?>