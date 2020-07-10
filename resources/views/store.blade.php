@extends('template.front')

@section('root')
        <div class="row justify-content-center">
            <div class="col-md-4">
                @if($store->logo)
                <img class="img-fluid" src="{{asset('storage').'/'.$store->logo}}" alt="logo {{$store->name}}" style="height: 150px; width:100%;">
            @else
                <img class="img-fluid" src="https://via.placeholder.com/600X300.png?text=logo" alt="Loja sem logo" style="height: 150px; width:100%;">
            @endif
            </div>
            <div class="col-md-8">
                <h2>{{$store->name}}</h2>
                <p>{{$store->description}}</p>
                <p>
                    <strong>Contatos:</strong>
                    <span>{{$store->phone}}</span> |
                    <span>{{$store->mobile_phone}}</span>
                </p>
                
            </div>
            
            <div class="col-md-12 my-4">
                <hr>
                <h3>Produtos desta loja:</h3>
                <hr>
            </div>
            @if ($store->product->count())
                @foreach ($store->product as $product)
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
            @else
            <div class="col-md-12">
                <div class="alert alert-warning alert-important" role="alert">
                    <h4>Nenhuma produto encontrado para essa loja.</h4>
                </div>
            </div>
            @endif
        </div>
@endsection