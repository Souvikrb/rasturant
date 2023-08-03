<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
class FrontendController extends Controller
{
    public function index()
    {
        
        return view('frontend/index');
    }

    public function cart()
    {
        
        return view('frontend/cart');
    }
    public function createUser()
    {
        
        return view('frontend/registration');
    }

    public function registerUser(Request $request)
    {
        
        $validated = $request->validate([
            'username'     => 'required',
            'phonenumber'  => 'required|numeric',
            'password'     => 'required',
            'email'        => 'required|email',
            'deliveryArea' => 'required',
            'address'      => 'required',
        ]);
        $data = new customer();
        $data['username']      = $request->username;
        $data['phonenumber']   = $request->phonenumber;
        $data['password']      = $request->password;
        $data['email']         = $request->email;
        $data['deliveryArea']  = $request->deliveryArea;
        $data['address']        = $request->address;
        $data->save();
        return redirect('/administrator');
    }
}
