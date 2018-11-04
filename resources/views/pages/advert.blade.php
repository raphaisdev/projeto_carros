@extends('layouts.default_template')

@section('content')

      <div class="card-deck">
          <div class="card">
              <div class="card-header">
                  <span class="h3 float-right">
                      @if ($advert->status==1)
                          <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Você ainda pode ver, mas não comprar o veículo"><i class="fas fa-info-circle"></i> Reservado</span>
                      @endif
                      @if ($advert->status==2)
                          <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Você ainda pode ver, mas não comprar o veículo"><i class="fas fa-money-bill-wave-alt"></i> Vendido</span>
                      @endif
                      R$ {{ number_format($advert->value, 2, ',', '.') }}</span>
                  {{$advert->title}}
              </div>
              <img class="card-img-top" src="{{$advert->picture}}" alt="{{$advert->title}}">
              <div class="card-body">
                  <h5 class="card-title"><small class="text-muted">Ano: </small>{{$advert->year}} / <small class="text-muted">Cor: </small>{{$advert->color}}
                  </h5>
                  <p class="card-text">{{$advert->description}}</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ {{ number_format($advert->value, 2, ',', '.') }}</span>

                  @if ($advert->status==0)
                  <form action="/cart" method="POST">
                      @csrf
                      <input type="hidden" name="advert_id" value="{{$advert->id}}">
                      <button type="submit" class="btn btn-success btn-lg float-right" role="button"><i class="far fa-money-bill-alt"></i> Comprar Carro</button>
                  </form>
                @endif

              </div>
          </div>
      </div>

@stop
