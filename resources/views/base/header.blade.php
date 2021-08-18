<nav class="navbar bg-gradient-primary" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
        <a class="" href="{{ route('dashboard.index') }}">Teste Back End</a>



        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Produtos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="{{ route('products.index') }}"> <i class="fas fa-list-alt"></i>
                        Listar</a>
                    <a class="dropdown-item" href="{{ route('products.create') }}"> <i class="fas fa-plus"></i>
                        Novo</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Clientes
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="{{ route('customers.index') }}"> <i class="fas fa-list-alt"></i>
                        Listar</a>
                    <a class="dropdown-item" href="{{ route('customers.create') }}"> <i class="fas fa-plus"></i>
                        Novo</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Vendas
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                    <a class="dropdown-item" href="{{ route('sales.index') }}"> <i class="fas fa-list-alt"></i>
                        Listar</a>
                    <a class="dropdown-item" href="{{ route('sales.create') }}"> <i class="fas fa-plus"></i>
                        Novo</a>
                </div>
            </li>



            <!-- User -->
            <li class="nav-item dropdown">
                <a id="bell" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fa fa-bell"></i>
                    <span id="bell-number" class="badge badge-danger badge-pill"></span>
                </a>
                <div id='notifications' class="dropdown-menu dropdown-menu-right position-absolute"
                    aria-labelledby="navbar-default_dropdown_1">
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <span class='d-md-down-none'>Albert Einsten</span>
                    <img class='rounded-pill' src='{{ url('/img/destaque-albert-einstein.jpg') }}' width='40'
                        height='40' alt='Albert Einsten'>
                </a>
                <div class="dropdown-menu dropdown-menu-right position-absolute">
                    <div class="dropdown-header">
                        <h6 class="text-overflow m-0">Bem vindo(a)!</h6>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
