<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Session;
use App\Models\Menu;
use App\Models\Submenu;
class AdminHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        if(Session::has('adminId')){
            $role ='1';
        }else{
            $role ='2';
        }
        $menu    = Menu::where(array('status'=>'1','role'=>$role))->get();
        $submenu = Submenu::where(array('status'=>'1','role'=>$role))->get();
        return view('components.admin-header')->with(array('menu'=>$menu,'submenu'=>$submenu));
    }
}
