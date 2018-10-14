<html>
<head>
    <title>Faculdade - @yield('title')</title>
    <link rel="stylesheet" href="/css/bootstrap.css">

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
      <h1 class="display-1">Home fica aqui</h1>

      <div class="card-deck">
          <div class="card">
              <img class="card-img-top" src="/img/dummy.png" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Marca / Modelo / Ano / Ano</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae corporis cumque, cupiditate, deserunt, dignissimos distinctio enim est eum id itaque minima modi nisi optio perspiciatis quibusdam totam velit veritatis! Harum.</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ 18.000</span>
                  <button type="button" class="btn btn-primary float-right">Visitar</button>
              </div>
          </div>
          <div class="card">
              <img class="card-img-top" src="/img/dummy.png" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Marca / Modelo / Ano / Ano</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae corporis cumque, cupiditate, deserunt, dignissimos distinctio enim est eum id itaque minima modi nisi optio perspiciatis quibusdam totam velit veritatis! Harum.</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ 18.000</span>
                  <button type="button" class="btn btn-primary float-right">Visitar</button>
              </div>
          </div>
          <div class="card">
              <img class="card-img-top" src="/img/dummy.png" alt="Card image cap">
              <div class="card-body">
                  <h5 class="card-title">Marca / Modelo / Ano / Ano</h5>
                  <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Beatae corporis cumque, cupiditate, deserunt, dignissimos distinctio enim est eum id itaque minima modi nisi optio perspiciatis quibusdam totam velit veritatis! Harum.</p>
              </div>
              <div class="card-footer">
                  <span class="h3 float-left">R$ 18.000</span>
                  <button type="button" class="btn btn-primary float-right">Visitar</button>
              </div>
          </div>
      </div>
  </main>

</body>
</html>
