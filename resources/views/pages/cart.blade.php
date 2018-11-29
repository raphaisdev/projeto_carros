@extends('layouts.default_template')

@section('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $total = 0;
    @endphp

    <div class="card shopping-cart">
        <div class="card-header bg-info text-light">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i>Carrinho
            <a href="/" class="btn btn-outline-light btn-sm float-right">Continuar navegando</a>
            <div class="clearfix"></div>
        </div>
        <div class="card-body">
        @forelse ($adverts as $advert)
            <!-- PRODUCT -->
            <div class="row">
                <div class="col-12 col-sm-12 col-md-2 text-center">
                    <img class="img-responsive" src="{{$advert->picture}}" alt="prewiew" width="120">
                </div>
                <div class="col-12 text-sm-center col-sm-12 text-md-left col-md-6">
                    <p class="product-name"><strong>{{$advert->title}}</strong></p>
                    <p>
                        <small class="text-muted">Ano: </small>{{$advert->year}} / <small class="text-muted">Cor: </small>{{$advert->color}}
                    </p>
                </div>
                <div class="col-12 col-sm-12 text-sm-center col-md-4 text-md-right row">
                    <div class="col-3 col-sm-3 col-md-6 text-md-right" style="padding-top: 5px">
                        <h6>R$ <strong>{{ number_format($advert->value, 2, ',', '.') }}</strong></h6>
                    </div>
                    <div class="col-2 col-sm-2 col-md-2 text-right">
                        <form action="/cart/{{$advert->id}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-xs">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <hr>
            @php
                $total += $advert->value;
            @endphp
            <!-- END PRODUCT -->
            @empty
                <div class="alert alert-info text-center" role="alert">
                    <i class="fas fa-exclamation-circle"></i> Nenhum anúncio foi adicionado ainda.
                </div>
                <br><br>
            @endforelse
        </div>
        @if (count($adverts) > 0)
        <div class="card-footer">
            <div class="float-left">
                <h4 class="text-muted">Total: R$ <b class="text-danger">{{ number_format($total, 2, ',', '.') }}</b></h4>
            </div>

            @auth
                <form action="/buy" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-money-check-alt"></i> Checkout</button>
                </form>
            @endauth

        </div>
        @endif
    </div>

@stop
