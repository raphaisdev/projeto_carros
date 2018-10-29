<html>
<head>
    <title>Faculdade - @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.css">
    <style>
        body {
            padding-top: 54px;
        }
        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }
        .card-deck{
            margin-bottom: 20px;
        }
        .btn.btn-primary{
            color:#fff!important;
            font-weight: bold;
        }
    </style>

    @if(isset(Auth::user()->email))
        <script>window.location="/main/successlogin";</script>
    @endif

</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">VendAuto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline mt-2 mt-md-0" method="get">
            @csrf
            <input class="form-control mr-sm-2" name="busca" type="text" placeholder="Busca" aria-label="Busca">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>

  <main role="main" class="container">
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
              @if ($errors->login->first())
                  <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $errors->login->first() }}</strong>
                  </div>
              @endif

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
                      <input type="submit" name="login" class="btn btn-primary" value="Login" />
                  </div>
              </form>
          </div>
          <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <br>
              @if ($errors->register->first())
                  <div class="alert alert-danger alert-block">
                      <button type="button" class="close" data-dismiss="alert">×</button>
                      <strong>{{ $errors->register->first() }}</strong>
                  </div>
              @endif

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
                      <label>Nome</label>
                      <input type="text" name="name" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" name="email" class="form-control" />
                  </div>
                  <div class="form-group">
                      <label>Senha</label>
                      <input type="password" name="password" class="form-control" />
                  </div>
                  <div class="form-group">
                      <input type="submit" name="login" class="btn btn-primary" value="Login" />
                  </div>
              </form>
          </div>
      </div>
  </main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
