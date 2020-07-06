<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <title>@yield('title')</title>

</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark" style="margin-bottom: 50px">
        <a class="navbar-brand" href="{{ route('home') }}">Marketplace_l6</a>
        <button class="navbar-toggler d-lg-none bg-default" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            @auth
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item @if(request()->is('admin/stores')) active @endif">
                    <a class="nav-link" href="{{ route('stores.index') }}">Lojas <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @if(request()->is('admin/products'))active @endif">
                    <a class="nav-link" href="{{ route('products.index') }}">Produtos</a>
                </li>
            </ul>
            @endauth
                <ul class="navbar-nav ml-auto mr-5">
                    @auth
                        <li class="nav-item">
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a href="#" class="nav-link dropdown-toggle" aria-label="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{ auth()->user()->name }}
                                    </a>
                                    <div class="dropdown-menu">
                                        <form id="logoutForm" action="{{ route('logout') }}" method="post" style="display: none">
                                            @csrf
                                        </form>
                                        <a href="#" class="dropdown-item"
                                            onclick="document.getElementById('logoutForm').submit();"
                                        >Sair <i class="fas fa-sign-out-alt"></i></a>

                                    </div>
                                </span>
                            </div>                            
                        </li>
                    @else
                        <li class="nav-item">
                            @if (request()->is('login'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @else    
                                <a class="nav-link" href="{{ route('login') }}">Login
                                    <i class="fas fa-sign-in-alt"></i>
                                </a>
                            @endif
                        </li>
                    @endauth
                    </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @include('flash::message')
            </div>
        </div>
        @yield('root')    
    </div>
</body>
</html>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
  <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
  </script>
</html>











