@extends('layouts.default_template')

@section('content')

    @if($search==true)
    <form class="form-inline mt-2 mt-md-0" method="get">
        @csrf
        <input class="form-control mr-sm-2" name="search" type="text" placeholder="Busca" aria-label="Busca">
        <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
    </form>
    @endif

    @forelse ($adverts as $advert)
        @if ($loop->first)
            <div class="card-deck">
                @endif

                <div class="card">
                    <img class="card-img-top" src="{{$advert->picture}}" alt="{{$advert->title}}">
                    <div class="card-body">
                        <h6 class="card-title"><small class="text-muted">Modelo: </small>{{ucfirst($advert->model->name)}} / <small class="text-muted">Marca: </small>{{$advert->model->brand->name}} / <small class="text-muted">Ano: </small>{{$advert->year}} / <small class="text-muted">Cor: </small>{{ucfirst($advert->color)}}
                        @if ($advert->status==1)
                                <span class="badge badge-info" data-toggle="tooltip" data-placement="top" title="Você ainda pode ver, mas não comprar o veículo"><i class="fas fa-info-circle"></i> Reservado</span>
                        @endif
                        @if ($advert->status==2)
                            <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="Você ainda pode ver, mas não comprar o veículo"><i class="fas fa-money-bill-wave-alt"></i> Vendido</span>
                        @endif
                        </h6>
                        <p class="card-text">{{$advert->title}}</p>
                    </div>
                    <div class="card-footer">
                        <span class="h3 float-left">R$ {{number_format($advert->value, 2, ',', '.')}}</span>
                        <a href="/{{$advert->id}}" class="btn btn-primary float-right" role="button"><i class="far fa-eye"></i> Visitar</a>
                    </div>
                </div>

                @if (($loop->index+1)%3==0 && !$loop->last)
            </div>
            <div class="card-deck">
                @endif

                @if($loop->last)
            </div>

            <div class="justify-content-center ">{{ $adverts->links() }}</div>
        @endif

    @empty
        <div class="alert alert-info text-center" role="alert">
            <i class="fas fa-exclamation-circle"></i> Nenhum anúncio encontrado.
        </div>
        <br><br>
    @endforelse

@stop
