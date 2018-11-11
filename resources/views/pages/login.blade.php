@extends('layouts.default_template')

@section('content')

      <ul class="nav nav-pills nav-justified" id="pills-tab" role="tablist">
          <li class="nav-item">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Entrar</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Cadastrar-se</a>
          </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <br>

              @if (count($errors) > 0)
                  <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <ul>
                          @foreach($errors->login->all() as $error)
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
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <br>
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

              <form method="post" action="{{ url('/register') }}">
                  @csrf
                  <div class="form-group">
                      <label>Nome:</label>
                      <input type="text" name="name" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Telefone:</label>
                      <input type="text" name="phone" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>E-mail:</label>
                      <input type="email" name="email" class="form-control" />
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
                      <button type="submit" name="login" class="btn btn-primary"><i class="fas fa-user-plus"></i> Cadastrar-se</button>
                  </div>
              </form>
          </div>
      </div>

@stop
