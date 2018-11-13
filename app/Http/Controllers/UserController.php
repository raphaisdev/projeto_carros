<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.register', ['user' => new User, 'action' => '/register', 'method' => 'POST', 'title' => 'Registrar-se', 'buttons'=> true]);
    }
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
            'phone'=>$request->input('phone'),
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
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if(!\Auth::check()){
            return redirect('/');
        }

        return view('pages.register', ['user' => auth()->user(), 'action' => '/user/edit', 'method' => 'PUT', 'title' => 'Meus dados', 'buttons'=> false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if(!\Auth::check()){
            return redirect('/');
        }

        $register = $this->validate($request, [
            'name' => 'required|string|between:3,50',
            'email'   => 'required|email|unique:users,'.auth()->user()->id,
            'password'  => 'nullable|alphaNum|between:3,30',
            'password_confirmation'  => 'required_with:password|same:password',
            'phone' => ['required', 'regex:/^(?:(?:\+|00)?\d{2}\s?)?(?:\(?([\d][\d])\)?\s?)?(?:((?:9\d|[2-9])\d{3})\-?(\d{4}))$/']
        ]);

        $user = User::find(auth()->user()->id);
        $user->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone')
        ]);
        if($request->input('password')!==null){
            $user->password = Hash::make($request->input('password'));
            $user->save();
        }

        return redirect('/user/edit')->with('success', 'Dados atualizados com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $user = User::find(auth()->user()->id);
        $user->delete();

        \Illuminate\Support\Facades\Auth::logout();
        return redirect('/');
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

        return view('pages.advert_list', ['adverts' => $adverts->paginate(9), 'search' => false, 'title' => 'Meus Anúncios']);
    }


    /**
     * List adverts created by logged user
     *
     * @return \Illuminate\Http\Response
     */
    public function buys()
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $adverts = Advert::whereHas('buy', function ($query) {
            $query->where('user_id', Auth::user()->id);
        })->with('model.brand');

        return view('pages.advert_list', ['adverts' => $adverts->paginate(9), 'search' => false, 'title' => 'Minhas Compras']);
    }
}
