@extends('layouts.default_template')

@section('content')

    @if($buttons==true)
    <div class="btn-group d-flex" role="group" aria-label="Basic example">
        <a href="/login/" class="btn btn-secondary btn-lg w-100" role="button">
            <i class="fas fa-sign-in-alt"></i> Entrar
        </a>

        <!-- Button trigger modal -->
        <a class="btn btn-primary btn-lg w-100" role="button">
            <i class="fas fa-user-plus"></i> Registrar-se
        </a>
    </div>
    <br>
    @endif

    @if( $method!='POST')
        <div class="form-group">
            <button type="button" class="btn btn-danger btn-lg float-right" data-toggle="modal" data-target="#exampleModalCenter">
                <i class="far fa-trash-alt"></i> Excluir Cadastro
            </button>
        </div>
    @endif
    <h4 class="display-4">{{ $title }}</h4>

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

    @if (session('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <p>{{session('success')}}</p>
        </div>
    @endif

    <form method="post" action={{ $action }}>
        @if( $method!='POST')
            {{ method_field($method) }}
        @endif
      @csrf
      <div class="form-group">
          <label>Nome:</label>
          <input type="text" name="name" class="form-control" required value="{{ old('name', $user->name) }}" />
      </div>
      <div class="form-group">
          <label>Telefone:</label>
          <input type="text" name="phone" class="form-control" required value="{{ old('phone', $user->phone) }}" />
      </div>
      <div class="form-group">
          <label>E-mail:</label>
          <input type="email" name="email" class="form-control" required value="{{ old('email', $user->email) }}" />
      </div>
      <div class="form-group">
          <label>Senha:</label>
          <input type="password" name="password" class="form-control" />
      </div>
      <div class="form-group">
          <label>Confirmação de Senha:</label>
          <input type="password" name="password_confirmation" class="form-control" />
      </div>
      <div class="form-group">
          <button type="submit" class="btn btn-primary"><i class="fas fa-user-plus"></i> Enviar Cadastro</button>
      </div>
    </form>

    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Excluir cadastro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Tem certeza de que deseja excluir o seu cadastro?
                </div>
                <div class="modal-footer">
                    <form method="post" action="/user/remove/">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                        @csrf
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
