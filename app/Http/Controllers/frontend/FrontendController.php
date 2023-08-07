<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class FrontendController extends Controller
{
    public function __construct()
    {
        $tempId = $this->encrypt('user'.rand(10,1000000));
        if(!isset($_COOKIE['tempId'])) {
            setcookie('tempId', $tempId, time() + (60 * 30), "/");
        } 
        
    }
    public function index()
    {
        
        $userId = $this->getUserId();
        $product = DB::select("SELECT p.*,c.count FROM `products` p left join carts c on p.id = c.product and c.tempId = '$userId'");	
        //$product = product::select("products.*","carts.count")->leftJoin("carts","products.id","=","carts.product",'carts.tempId',"=",'www')->get();
        return view('frontend/index')->with('products',$product);
    }


}
