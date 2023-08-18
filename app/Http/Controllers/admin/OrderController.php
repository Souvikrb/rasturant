<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use DB;
class OrderController extends Controller
{
   public function index(){
      $orderdata = order::select("orders.id","orders.mode","orders.bundle","orders.count as qunt","orders.status","orders.created_at","p.product as product_name","p.slPrice","p.prodImg","p.type","c.username","c.phonenumber","c.altPhonenumber","c.deliveryArea","c.address",DB::raw('( CASE WHEN orders.isHalf = 1 THEN " ( Half )" ELSE "" END) as half'),DB::raw("(select GROUP_CONCAT(CONCAT(o.count,' x ',pp.product, half,'<br>')) from orders o left join products pp on o.product = pp.id where o.bundle = orders.bundle  ) as plist"),DB::raw("(select sum(o.count*pp.slPrice) from orders o left join products pp on o.product = pp.id where o.bundle = orders.bundle  ) as sub_total")  )->leftJoin("products as p","orders.product","=","p.id")->leftJoin("customers as c","orders.userid","=","c.uniqueId")->where('orders.userid',$userId)->groupBy('orders.bundle')->get();
        //echo '<pre>';
        //print_r($orderdata);die;
   
 
        return view('administrator/OrderManager/orders',array('data'=>$orderdata));
   }

   public function updateOrderStatus(Request $request){
      $id = $request->id;
      $status = $request->status;
      order::where('bundle',$id)->update(['status'=>$status]);
      echo true;
   }
}
