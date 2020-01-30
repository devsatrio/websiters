<?php 
namespace App\lib;
use App\Model\Setting;

class setSetting{
   

    function setting(){
        $data=Setting::first();
        return $data;
    }

}
?>