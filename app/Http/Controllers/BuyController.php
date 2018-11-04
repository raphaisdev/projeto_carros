<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class BuyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cart = Session::get('cart', []);
        if($cart==[]){
            return redirect('/cart');
        }
        if(!Auth::check()){
            return redirect('/cart')->withErrors(['Somente usuários logados podem finalizar uma compra.']);
        }

        $user = Auth::user();

        foreach ($cart as $buying){
            Buy::create([
                'advert_id' => $buying,
                'user_id' => $user->id
            ]);
        }

        Advert::whereIn('id', $cart)->update(['status'=> 2]);

        Session::forget('cart');

        return redirect('/cart');
    }

}
