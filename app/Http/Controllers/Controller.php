<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Crypt;

class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getUserId(){
        return $this->decrypt($_COOKIE['tempId']);
    }

    public function encrypt($val){
        return  Crypt::encryptString($val);
    }

    public function decrypt($val){
        return Crypt::decryptString($val);
    }


}
