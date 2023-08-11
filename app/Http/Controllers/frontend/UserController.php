<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\cart;
use App\Models\order;
use DB;
use Session;

class UserController extends Controller
{
    public function createUser()
    {
        
        return view('frontend/registration');
    }

    public function login()
    {
        
        return view('frontend/login');
    }

    public function registerUser(Request $request)
    {
        $userId = $this->getUserId();

        /* Create new customer ==============*/
        $validated = $request->validate([
            'username'     => 'required',
            'phonenumber'  => 'required|numeric|unique:customers',
            'password'     => 'required',
            'deliveryArea' => 'required',
            'address'      => 'required',
        ]);
        $data = new customer();
        $data['uniqueId']      = $userId ;
        $data['username']      = $request->username;
        $data['phonenumber']   = $request->phonenumber;
        $data['password']      = $this->encrypt($request->password);
        $data['email']         = $request->email;
        $data['deliveryArea']  = $request->deliveryArea;
        $data['address']       = $request->address;
        $data->save();

        /* Data transfer cart to order table ==============*/
        $customer_id = $userId;
        Session::put(array('userId'=>$customer_id,'username'=>$request->username));
        setcookie('tempId', $this->encrypt($customer_id), time() + (60 * 30), "/");
        $placeOrder = 0;
        if(isset($_COOKIE['placeOrder'])){
            $placeOrder = $_COOKIE['placeOrder'];
        }
        
        if($placeOrder == '1'){
            $cartData = cart::where('userId',$userId)->get();
            $bundle = $userId.'-'.rand(10,100);
            foreach($cartData as $c){
                // $orderObj[] = array('userid'=>$c->userid,'product'=>$c->product,'count'=>$c->count,'mode'=>'COD','status'=>'Processing');
                $orderObj = new order();
                $orderObj['userid']      = $customer_id;
                $orderObj['product']     = $c->product;
                $orderObj['count']       = $c->count;
                $orderObj['bundle']      = $bundle;
                $orderObj['mode']        = 'COD';
                $orderObj['status']      = 'Processing';
                $orderObj->save();
                
            }
            //DB::table('orders')->insert($orderObj);

            /* Delete cart data ==============*/
            cart::where('userid',$userId)->delete();
            setcookie('placeOrder','', time() + (60 * 30), "/");
        }
        
        return redirect('/user/order');
    }

    public function loginUser(Request $request)
    {

        /* Create new customer ==============*/
        $validated = $request->validate([
            'phonenumber'  => 'required|numeric',
            'password'     => 'required',
        ]);

        $data = customer::where(array('phonenumber'=>$request->phonenumber))->first();
        if($data){
            if($request->password == $this->decrypt($data->Password)){
                Session::put(array('userId'=>$data->uniqueId,'username'=>$data->username));
                setcookie('tempId', $this->encrypt($data->uniqueId), time() + (60 * 30), "/");
                /* Data transfer cart to order table ==============*/
                $customer_id = $data->uniqueId;
                $userId = $this->getUserId();
                $placeOrder = 0;
                if(isset($_COOKIE['placeOrder'])){
                    $placeOrder = $_COOKIE['placeOrder'];
                }
                if($placeOrder == '1'){
                    $cartData = cart::where('userId',$userId)->get();
                    $bundle = $userId.'-'.rand(10,100);
                    foreach($cartData as $c){
                        // $orderObj[] = array('userid'=>$c->userid,'product'=>$c->product,'count'=>$c->count,'mode'=>'COD','status'=>'Processing');
                        $orderObj = new order();
                        $orderObj['userid']      = $customer_id;
                        $orderObj['product']     = $c->product;
                        $orderObj['count']       = $c->count;
                        $orderObj['bundle']      = $bundle;
                        $orderObj['mode']        = 'COD';
                        $orderObj['status']      = 'Processing';
                        $orderObj->save();
                        
                    }
                    //DB::table('orders')->insert($orderObj);

                    /* Delete cart data ==============*/
                    cart::where('userid',$userId)->delete();
                    setcookie('placeOrder','', time() + (60 * 30), "/");
                    return redirect('/user/order');
                }
                return redirect('/');
            }else{
                return redirect('/login')->withErrors(array('loginerror'=>'Your credentials is incorrect'));
            }
            
        }else{
            return redirect('/login')->withErrors(array('loginerror'=>'Your credentials is incorrect'));
        }
     

        /* Data transfer cart to order table ==============*/
        // $customer_id = $data->id;
        // Session::put('userId', $data->id);
        // $userId = $this->getUserId();
        // $cartData = cart::where('userId',$userId)->get();
       
        // foreach($cartData as $c){
        //     $orderObj = new order();
        //     $orderObj['userid']      = $customer_id;
        //     $orderObj['product']     = $c->product;
        //     $orderObj['count']       = $c->count;
        //     $orderObj['mode']        = 'COD';
        //     $orderObj['status']      = 'Processing';
        //     $orderObj->save();
            
        // }

        /* Delete cart data ==============*/
        // cart::where('userid',$userId)->delete();
        // return redirect('/administrator');
    }

    public function logout(){
        Session::forget('userId');
        Session::forget('username');
        setcookie('placeOrder','', time() + (60 * 30), "/");
        setcookie('tempId','', time() + (60 * 30), "/");
        return redirect('/');
    }

    public function order(){
        $orderdata = order::select("orders.id","orders.mode","orders.count as qunt","orders.status","orders.created_at","p.product as product_name","p.slPrice","p.prodImg","p.type","c.username","c.phonenumber","c.altPhonenumber","c.deliveryArea","c.address")->leftJoin("products as p","orders.product","=","p.id")->leftJoin("customers as c","orders.userid","=","c.id")->get();
 
        return view('frontend/dashboard/order')->with(array('data'=>$orderdata));
    }






}
