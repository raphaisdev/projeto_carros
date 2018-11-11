<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use App\Models\CarBrand;
use App\Models\CarModel;
use Illuminate\Http\Request;

class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $adverts = Advert::with(['model.brand'])->orderBy('status', 'asc')->orderBy('created_at', 'desc');

        if($request->has('search') && strlen(trim($request->input('search'))) > 3){
            $adverts = $adverts->where('title', 'like', '%'.$request->input('search').'%')
                ->orWhere('description', 'like', '%'.$request->input('search').'%');
        }

        return view('pages.advert_list', ['adverts' => $adverts->paginate(9), 'search' => true]);
    }

    /** =x
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $brands = CarBrand::orderBy('name', 'ASC')->with(['models' => function ($q) {
            $q->orderBy('name', 'ASC');
        }])->get();

        $action = url('/advert/new');
        $method = "POST";

        return view('pages.advert_form', ['advert' => new Advert,'brands' => $brands, 'action' => $action, 'method' => $method]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $anoAtual = date('Y');
        $advert = $this->validate($request, [
            'title' => 'required|string|between:3,190',
            'description'   => 'required|string|between:3,500',
            'car_model_id'  => 'required|exists:car_models,id',
            'color' => 'required|string|between:3,30',
            'year' => 'required|integer|between:1900,{$anoAtual}',
            'value' => 'required|string',
            'picture' => 'required|file|image|dimensions:min_width=320,min_height=240'
        ]);

        $advert = Advert::create([
            'title' => $request->title,
            'description' => $request->description,
            'car_model_id' => $request->car_model_id,
            'year' => $request->year,
            'color' => $request->color,
            'value' => $request->value,
            'user_id' => auth()->user()->id,
            'status' => 0
        ]);

        $extension = $request->picture->extension();
        $nameFile = "{$advert->id}.{$extension}";
        $upload = $request->picture->storeAs('adverts', $nameFile);

        $advert->picture = url($upload);
        $advert->save();

        return redirect('/'.$advert->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($advertId)
    {
        return view('pages.advert', ['advert' => Advert::findOrFail($advertId)->load(['model.brand', 'user'])]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $advert = Advert::where('user_id', auth()->user()->id)->where('status', 0)->where('id', $id)->first();

        if(!$advert){
            return back();
        }

        $brands = CarBrand::orderBy('name', 'ASC')->with(['models' => function ($q) {
            $q->orderBy('name', 'ASC');
        }])->get();

        $action = url('/advert/edit/'.$advert->id);
        $method = "PUT";

        return view('pages.advert_form', ['advert' => $advert,'brands' => $brands, 'action' => $action, 'method' => $method]);
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
        if(!\Auth::check()){
            return redirect('/');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!\Auth::check()){
            return redirect('/');
        }
        $advert = Advert::where('user_id', auth()->user()->id)->where('status', 0)->where('id', $id)->first();

        if(!$advert){
            return back();
        }

        $advert->delete();

        return redirect('/user/adverts');
    }
}
