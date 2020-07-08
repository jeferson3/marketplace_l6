@extends('template.app')

@section('root')

    <div class="row">
        
        <div class="col-md-4">

            @if ($product->photo->count())
                <img class="img-fluid" src="{{ asset('storage/'.$product->photo->first()->image) }}">
                <div class="row mt-2">
                    <div class="col-md-4">

                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                            @foreach ($product->photo as $key => $photo)
                                @if($key == 0)
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            @else
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$key}}"></li>
                                @endif
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100 img-fluid" src="{{ asset('storage') .'/'. $product->photo->first()->image}}">
                            </div>
                            @foreach ($product->photo as $photo)
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="{{ asset('storage/'.$photo->first()->image) }}">
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Anterior</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Próximo</span>
                        </a>
                    </div>
                </div>
                </div>
            @else
                <img class="card-img-top" src="{{ asset('assets/no-photo.jpg') }}" style="height: 200px;">
            @endif
        </div>
        <div class="col-md-8">
            <div class="form-group">
                <h2>{{$product->name}}</h2>
                <h3>
                    R${{number_format($product->price, 2, ',', '.')}}
                </h3>
                <span>
                    Loja: {{$product->store->name}}
                </span>
            </div>
            <div class="form-group">
                <form action="{{route('cart.add')}}" method="post">
                    @csrf
                    <input type="hidden" name="product[name]" value="{{$product->name}}">
                    <input type="hidden" name="product[price]" value="{{$product->price}}">
                    <input type="hidden" name="product[slug]" value="{{$product->slug}}">
                        <div class="form-group">
                            <label for="amount">Quantidade:</label>
                            <input type="number" id='amount' name="product[amount]" class="form-control col-md-2" value="1" min="1">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                Comprar
                            </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            {{$product->body}}
        </div>        
    </div>

@endsection
