<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    private $data = array(
        'controller' => 'AdminAuth\HomeController',
        'title' => 'Home',
        'menu' => 'home',
        'submenu' => '',
    );

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.home',$this->data);
    }
}
