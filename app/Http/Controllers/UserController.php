<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $register = $this->validate($request, [
            'name' => 'required|string|between:3,50',
            'email'   => 'required|email|unique:users',
            'password'  => 'required|confirmed|alphaNum|between:3,30',
            'phone' => ['required', 'regex:/^(?:(?:\+|00)?\d{2}\s?)?(?:\(?([\d][\d])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/']
        ]);

        User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=> Hash::make($request->input('password'))
        ]);

        $user_data = array(
            'email'  => $request->get('email'),
            'password' => $request->get('password')
        );

        if(Auth::attempt($user_data))
        {
            return redirect('/');
        }

        return back()->withErrors(['O usuário foi criado, mas não foi possível logar.']);
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


    /**
     * List adverts created by logged user
     *
     * @return \Illuminate\Http\Response
     */
    public function adverts()
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $adverts = Advert::where('user_id', auth()->user()->id)->with('model.brand');

        return view('pages.advert_list', ['adverts' => $adverts->paginate(9), 'search' => false]);
    }
}
