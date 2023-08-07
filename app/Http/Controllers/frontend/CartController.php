<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\cart;
use Session;
class CartController extends Controller
{

    public function index()
    {   
        $userId = $this->getUserId();
        //$cart = cart::where('userid',$userId)->get();
        $cart = cart::select("products.product as productname","products.prodImg","products.slPrice","products.tags","carts.*",'products.id as prodid')->join("products","products.id","=","carts.product")->where('carts.userId',$userId)->where('carts.count','!=','0')->get();
        return view('frontend/cart')->with('cartdata',$cart);
    }
    public function addtoCart(Request $request){
        $id = $request->id;
        $type = $request->type;
        $userId = $this->decrypt($_COOKIE['tempId']);
        $data = cart::where(array('userid'=>$userId,'product'=>$id))->first();
        $objs = new cart();
        if(!empty($data)):
            $count = $data->count;
            if($type == 'add'){
                $count++;
            }else if($type == 'remove'){
                $count--;
            }
            
            cart::where(array('userid'=>$userId,'product'=>$id))->update(array('count' => $count));
            
            echo json_encode(array('count'=>$count));
        else: 
            
            $objs['userid']   = $userId;
            $objs['tempId']   = $userId;
            $objs['product']  = $id;
            $objs['count']    = 1;
            $objs->save();
            echo json_encode(array('count'=>1));
        endif;
        
    }

    public function orderSubmit(Request $request)
    {  
        
        $userId = Session::get('userId');
        if($userId == ''){
            setcookie('placeOrder', '1', time() + (60 * 30), "/");
            return redirect('/user/register');
        }else{
            echo '1';die;
        }
    }
}
