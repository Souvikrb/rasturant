<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
class AdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('administrator/dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
     
        return view('administrator/login');
    }

    public function login_save(Request $request)
    {
        $validation = $request->validate([
            'phone'    => 'required|numeric',
            'password' => 'required'
        ]);
        $data = user::where('phone',$request->phone)->first();
        if(!empty($data)){
            if($request->password == $this->decrypt($data->password)){
                Session::put('adminId', $data->id);
                return redirect('/administrator')->withErrors(array('successMessage'=>'Your are successfully logged in.'));
            }else{
                return redirect('/admin/login')->withErrors(array('loginerror'=>'Your credentials is incorrect.'));
            }
        }else{
            return redirect('/admin/login')->withErrors(array('loginerror'=>'Your don\'t have an account.'));
        }

        




        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
