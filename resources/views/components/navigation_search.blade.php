<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="/"><i class="fas fa-car circle-icon"></i> VendAuto</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(isset(Auth::user()->email))
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="/advert/new"><i class="fas fa-ad"></i> Criar Anuncio</a>
                    <a class="dropdown-item" href="/buy"><i class="fas fa-history"></i> Minhas Compras</a>
                    <a class="dropdown-item" href="/logout"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </div>
            </li>
            @else
            <li class="nav-item">
                <a class="nav-link" href="/login">Cadastrar-se / Entrar</a>
            </li>
            @endif


            <li class="nav-item">
                <a class="nav-link" href="/cart"><i class="fas fa-shopping-cart"></i> Carrinho</a>
            </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0" method="get">
            @csrf
            <input class="form-control mr-sm-2" name="search" type="text" placeholder="Busca" aria-label="Busca">
            <button class="btn btn-primary my-2 my-sm-0" type="submit">Buscar</button>
        </form>
    </div>
</nav>
