<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index');
    }

    public function register()
    {
        $this->validate(request(),[
            'name' => 'required|min:3|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|max:10|confirmed',   //password_confirmation 确认密码必须这个名字
        ]);

        //逻辑
        $name = \request('name');
        $email = \request('email');
        $password = bcrypt(\request('password'));
        User::create(compact('name','email','password'));

        //渲染
        return redirect('/login');
    }
}
