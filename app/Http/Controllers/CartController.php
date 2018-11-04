<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = [];
        $sessionIds = Session::get('cart', []);
        if($sessionIds!=[]){
            $adverts = Advert::whereIn('id', $sessionIds)->get();
        }

        return view('pages.cart')->with(['adverts'=> $adverts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $advert = Advert::find($request->input('advert_id'));
        $error = null;
        if(!$advert){
           $error = ['O anuncío não foi encontrado.'];
        }
        if($advert->status=='1'){
            $error = ['O veículo está reservado.'];
        }
        if($advert->status=='2'){
            $error = ['O veículo já foi vendido.'];
        }
        if($error!=null){
            return redirect('/cart')->withErrors($error);
        }

        $request->session()->push('cart', $advert->id);

        $advert->status = '1';
        $advert->save();

        return redirect('/cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $advertIds = Session::get('cart', []);
        if(count($advertIds) > 0){
            $advertIds = array_diff($advertIds, [$id]);
            Advert::where('id', $id)->update(['status'=>0]);
        }
        Session::put('cart', $advertIds);
        return redirect('/cart');
    }
}
