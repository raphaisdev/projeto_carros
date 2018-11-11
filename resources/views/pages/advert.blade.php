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
                  <h5 class="card-title"><small class="text-muted">Modelo: </small>{{ucfirst($advert->model->name)}} / <small class="text-muted">Marca: </small>{{$advert->model->brand->name}} / <small class="text-muted">Ano: </small>{{$advert->year}} / <small class="text-muted">Cor: </small>{{ucfirst($advert->color)}}
                  </h5>
                  <h5 class="card-title"><small class="text-muted">Anunciante: </small>{{ucfirst($advert->user->name)}} / <small class="text-muted">Telefone: </small>{{$advert->user->phone}}
                  </h5>
                  <p class="card-text">{!! nl2br(e($advert->description)) !!}</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ {{ number_format($advert->value, 2, ',', '.') }}</span>

                  @if ($advert->status==0)
                      @if(auth()->user()->id!=$advert->user_id)
                  <form action="/cart" method="POST">
                      @csrf
                      <input type="hidden" name="advert_id" value="{{$advert->id}}">
                      <button type="submit" class="btn btn-success btn-lg float-right" role="button"><i class="far fa-money-bill-alt"></i> Comprar Carro</button>
                  </form>
                  @else
                  <div class="btn-group float-right" role="group" aria-label="Basic example">
                      <a href="/advert/edit/{{$advert->id}}" class="btn btn-info btn-lg" role="button"><i class="far fa-money-bill-alt"></i> Editar Anúncio</a>

                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#exampleModalCenter">
                              <i class="far fa-trash-alt"></i> Excluir Anúncio
                          </button>
                  </div>
                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLongTitle">Excluir Anúncio</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                          </button>
                                      </div>
                                      <div class="modal-body">
                                          Tem certeza de que deseja excluir o anúncio?
                                      </div>
                                      <div class="modal-footer">
                                          <form method="post" action="/advert/remove/{{$advert->id}}">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                              @csrf
                                              {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Excluir</button>
                                          </form>
                                      </div>
                                  </div>
                              </div>
                          </div>


                  @endif
                @endif

              </div>
          </div>
      </div>

@stop
