<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\order;
use DB;
class OrderController extends Controller
{
   public function index(){
      $orderdata = order::select("orders.id","orders.mode","orders.count as qunt","orders.status","orders.created_at","p.product as product_name","p.slPrice","p.prodImg","p.type","c.username","c.phonenumber","c.altPhonenumber","c.deliveryArea","c.address")->leftJoin("products as p","orders.product","=","p.id")->leftJoin("customers as c","orders.userid","=","c.uniqueId")->groupBy('orders.bundle')->get();
   
 
        return view('administrator/OrderManager/orders',array('data'=>$orderdata));
   }

   public function updateOrderStatus(Request $request){
      $id = $request->id;
      $status = $request->status;
      order::where('id',$id)->update(['status'=>$status]);
      echo true;
   }
}
