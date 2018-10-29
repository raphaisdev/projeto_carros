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
</head>
<body>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">VendAuto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(isset(Auth::user()->email))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/logout">Sair</a>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/login">Cadastrar-se / Entrar</a>
            </li>
            @endif
        </ul>
        <form class="form-inline mt-2 mt-md-0" method="get">
            @csrf
            <input class="form-control mr-sm-2" name="busca" type="text" placeholder="Busca" aria-label="Busca">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>

  <main role="main" class="container">

  @forelse ($adverts as $advert)
      @if ($loop->first)
          <div class="card-deck">
      @endif

              <div class="card">
                  <img class="card-img-top" src="{{$advert->picture}}" alt="{{$advert->title}}">
                  <div class="card-body">
                      <h5 class="card-title"><small class="text-muted">Ano: </small>{{$advert->year}} / <small class="text-muted">Cor: </small>{{$advert->color}}</h5>
                      <p class="card-text">{{$advert->title}}</p>
                  </div>
                  <div class="card-footer">
                      <span class="h3 float-left">R$ {{number_format($advert->value, 2, ',', '.')}}</span>
                      <a href="/{{$advert->id}}" class="btn btn-primary float-right" role="button">Visitar</a>
                  </div>
              </div>

      @if (($loop->index+1)%3==0 && !$loop->last)
          </div>
          <div class="card-deck">
      @endif

      @if($loop->last)
          </div>
      @endif

  @empty
      <p>Nenhum anúncio encontrado.</p>
  @endforelse
  </main>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="js/bootstrap.js"></script>
</body>
</html>
