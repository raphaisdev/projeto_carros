<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="d-flex flex-grow-1">
        <span class="w-100 d-lg-none d-block"><!-- hidden spacer to center brand on mobile --></span>
        <a class="navbar-brand d-none d-lg-inline-block" href="/"><i class="fas fa-car circle-icon"></i> VendAuto</a>
        <a class="navbar-brand-two mx-auto d-lg-none d-inline-block" href="#">
            <img src="//placehold.it/40?text=LOGO" alt="logo">
        </a>
        <div class="w-100 text-right">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
    <div class="collapse navbar-collapse flex-grow-1 text-right" id="myNavbar">
        <ul class="navbar-nav ml-auto flex-nowrap">
            <li class="nav-item active">
                <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
            </li>
            @if(isset(Auth::user()->email))
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{Auth::user()->name}}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/advert/new"><i class="fas fa-ad"></i> Criar Anúncio</a>
                        <a class="dropdown-item" href="/user/adverts"><i class="fas fa-bookmark"></i> Meus Anuncios</a>
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
    </div>
</nav>
