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
            <li class="nav-item">
                <a class="nav-link" href="#">Cadastrar-se</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Entrar</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0" method="get">
            @csrf
            <input class="form-control mr-sm-2" name="busca" type="text" placeholder="Busca" aria-label="Busca">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>

  <main role="main" class="container">
      <div class="card-deck">
          <div class="card">
              <img class="card-img-top" src="{{$advert->picture}}" alt="{{$advert->title}}">
              <div class="card-body">
                  <h5 class="card-title">{{$advert->title}}</h5>
                  <p class="card-text">{{$advert->description}}</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ {{number_format($advert->value, 2, ',', '.')}}</span>
                  <a href="/{{$advert->id}}" class="btn btn-primary float-right" role="button">Visitar {{$advert->id}}</a>
              </div>
          </div>
      </div>
  </main>

</body>
</html>
