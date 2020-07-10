<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        h1,h2,h3,h4,h5{
            color: grey;
        }
    </style>

</head>
<body>
    <nav class="navbar navbar-expand-md navbar-light bg-primary" style="margin-bottom: 50px">
        <a class="navbar-brand" href="{{ route('home') }}">Marketplace_l6</a>
        <button class="navbar-toggler d-lg-none bg-default" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item @if(request()->is('/')) active @endif">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item @if(request()->is('category/'. $category->slug)) active @endif">
                        <a class="nav-link" href="{{route('category.single', $category->slug)}}">{{$category->name}}</a>
                    </li>
                @endforeach
            </ul>
                <ul class="navbar-nav ml-auto mr-5">
                    <li class="nav-item">
                        <a href="{{route('cart.index')}}" class="nav-link">
                            <i class="fas fa-cart-arrow-down">
                            </i>
                            <span class="badge badge-danger">@if (session()->has('cart')) {{count(session()->get('cart'))}} @else 0 @endif</span>
                        </a>
                    </li>
                </ul>
        </div>
    </nav>
    <div class="container">
        @include('flash::message') 
        @yield('root')    
    </div>
</body>
</html>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  </body>
  <script>
      $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
  </script>
  @yield('scripts')
</html>











