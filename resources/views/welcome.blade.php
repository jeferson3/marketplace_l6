@extends('template.front')

@section('root')
    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-md-4">
                    @if ($product->photo->count())
                        <img class="img-fluid" src="{{ asset('storage/'.$product->photo->first()->image) }}" style="height: 200px; width:100%;">
                    @else
                        <img class="img-fluid" src="{{ asset('assets/no-photo.jpg') }}" style="height: 200px; width:100%;">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{$product->name}}</h4>
                        
                        <p class="card-text">{{$product->description}}</p>
                        <h3>
                            R${{number_format($product->price, 2, ',', '.')}}
                        </h3>
                        <a href="{{ route('product.single', $product->slug) }}" class="btn btn-success">
                            Ver produto</a>
                    </div>
                </div>
                @endforeach
            </div>
        <hr>
    <div class="row">
        <div class="col-md-12 my-3">
            <h2>Lojas em destaque</h2>
            <hr>
        </div>
        @foreach ($stores as $store)
        <div class="col-md-4">
            @if($store->logo)
                <img class="img-fluid" src="{{asset('storage').'/'.$store->logo}}" alt="logo {{$store->name}}" style="height: 150px; width:100%;">
            @else
                <img class="img-fluid" src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo" style="height: 150px; width:100%;">
            @endif
                <h3>{{$store->name}}</h3>
                <p>{{$store->description}}</p>
            </div>
        @endforeach
    </div>
    <hr>
@endsection

