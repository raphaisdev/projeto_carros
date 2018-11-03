@extends('layouts.default_template')

@section('content')

      <div class="card-deck">
          <div class="card">
              <div class="card-header">
                  <span class="h3 float-right">R$ {{ number_format($advert->value, 2, ',', '.') }}</span>
                  {{$advert->title}}
              </div>
              <img class="card-img-top" src="{{$advert->picture}}" alt="{{$advert->title}}">
              <div class="card-body">
                  <h5 class="card-title"><small class="text-muted">Ano: </small>{{$advert->year}} / <small class="text-muted">Cor: </small>{{$advert->color}}</h5>
                  <p class="card-text">{{$advert->description}}</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ {{ number_format($advert->value, 2, ',', '.') }}</span>
                  <a href="/{{$advert->id}}" class="btn btn-success btn-lg float-right" role="button"><i class="far fa-money-bill-alt"></i> Comprar Carro</a>
              </div>
          </div>
      </div>

@stop
