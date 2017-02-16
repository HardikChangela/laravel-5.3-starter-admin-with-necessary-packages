<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private $data = array(
        'controller' => 'AdminAuth\HomeController',
        'title' => 'Profile',
        'menu' => '',
        'submenu' => '',
    );
    
    public function index()
    {
        return view('admin.profile',$this->data);
    }

    public function password(Request $request)
    {

        $this->validate($request, [
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);


        return $record = Auth::guard('admin')->user();

        $request['password'] = bcrypt($request['password']);

        $record->update($request->all());
        $val =  route('admin.profile.edit',$id);
        return redirect($val);
    }
}
