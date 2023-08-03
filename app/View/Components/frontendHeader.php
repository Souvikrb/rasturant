<?php

namespace App\View\Components;

use Illuminate\View\Component;


class frontendHeader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $tempId = 'user'.rand(10,1000000);
        if(!isset($_COOKIE['tempId'])) {
            setcookie('tempId', $tempId, time() + (86400 * 30), "/");
        } 
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.frontend-header');
    }
}
