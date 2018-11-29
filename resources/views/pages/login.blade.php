@extends('layouts.default_template')

@section('content')

    <div class="btn-group d-flex" role="group" aria-label="Basic example">
        <a class="btn btn-primary btn-lg w-100" role="button">
            <i class="fas fa-sign-in-alt"></i> Entrar
        </a>

        <!-- Button trigger modal -->
        <a href="/register/" class="btn btn-secondary btn-lg w-100" role="button">
            <i class="fas fa-user-plus"></i> Registrar-se
        </a>
    </div>
    <br>

    <h4 class="display-4">Acessar</h4>

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

    <form method="post" action="{{ url('/login') }}">
      @csrf
      <div class="form-group">
          <label>E-mail</label>
          <input type="email" name="email" class="form-control" />
      </div>
      <div class="form-group">
          <label>Senha</label>
          <input type="password" name="password" class="form-control" />
      </div>
      <div class="form-group">
          <button type="submit" name="login" class="btn btn-primary"><i class="fas fa-user-lock"></i> Login</button>
      </div>
    </form>

@stop
