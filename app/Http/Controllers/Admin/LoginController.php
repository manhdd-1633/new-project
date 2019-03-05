<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Session;
class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function postLogin(Request $request)
    {
        $this->validate(
            $request,
            [
                'email' => 'required|email',
                'password' => 'required|min:6',
            ],
            [
                'email.required' => 'cannot be empty field',
                'email.email' => 'Email invalidate..!',
                'password.required' => 'cannot be empty field',
                'password.min' => 'Passwords must be longer than 6 characters',
            ]
        );
        $login = array(
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        );

        if (Auth::attempt($login)) {

            return redirect()->route('dashboard');
        } else {
          
            return redirect()->back()->with('danger', 'login failed, account does not exist..!');
        }
    }
    public function logOut()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function index()
    {
        return view('admin.home.index');
    }

}
