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

        /* Create new customer ==============*/
        $validated = $request->validate([
            'username'     => 'required',
            'phonenumber'  => 'required|numeric|unique:customers',
            'password'     => 'required',
            'deliveryArea' => 'required',
            'address'      => 'required',
        ]);
        $data = new customer();
        $data['username']      = $request->username;
        $data['phonenumber']   = $request->phonenumber;
        $data['password']      = $this->decrypt($request->password);
        $data['email']         = $request->email;
        $data['deliveryArea']  = $request->deliveryArea;
        $data['address']       = $request->address;
        $data->save();

        /* Data transfer cart to order table ==============*/
        $customer_id = $data->id;
        Session::put('userId', $data->id);
        $userId = $this->getUserId();
        $cartData = cart::where('userId',$userId)->get();
       
        foreach($cartData as $c){
            // $orderObj[] = array('userid'=>$c->userid,'product'=>$c->product,'count'=>$c->count,'mode'=>'COD','status'=>'Processing');
            $orderObj = new order();
            $orderObj['userid']      = $customer_id;
            $orderObj['product']     = $c->product;
            $orderObj['count']       = $c->count;
            $orderObj['mode']        = 'COD';
            $orderObj['status']      = 'Processing';
            $orderObj->save();
            
        }
        //DB::table('orders')->insert($orderObj);

        /* Delete cart data ==============*/
        cart::where('userid',$userId)->delete();
        return redirect('/administrator');
    }

    public function loginUser(Request $request)
    {

        /* Create new customer ==============*/
        $validated = $request->validate([
            'phonenumber'  => 'required|numeric',
            'password'     => 'required',
        ]);

        $data = customer::where(array('phonenumber'=>$request->phonenumber,'password'=>$request->password))->get();
        if($data->count() != 0){
            Session::put('userId', $data->id);
            return redirect('/administrator');
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
}
