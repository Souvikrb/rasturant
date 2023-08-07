<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
class OrderController extends Controller
{
   public function index(){
    $orderdata = order::select("orders.mode","orders.status","orders.created_at","p.product as product_name","p.slPrice","p.prodImg","p.type","c.username","c.phonenumber","c.altPhonenumber","c.deliveryArea","c.address")->leftJoin("products as p","orders.product","=","p.id")->leftJoin("customers as c","orders.userid","=","c.id")->get();
 
        return view('administrator/OrderManager/orders',array('data'=>$orderdata));
   }
}
