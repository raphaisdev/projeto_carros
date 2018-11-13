<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Validator;

class LoginController extends Controller
{
    public function index()
    {
        return view('pages.login');
    }

    function doLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password'  => 'required|alphaNum|min:3'
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/');
        }

        return back()->withErrors(['Usuário ou senha incorretos.']);
    }

    function logout()
    {
        Auth::logout();
        return back();
    }
}
