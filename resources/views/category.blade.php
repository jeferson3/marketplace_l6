@extends('template.front')

@section('root')
        <div class="row justify-content-center">
            <div class="col-md-12">
                <h2>{{$category->name}}</h2>
                <hr>
            </div>
            @if ($category->product->count())
                @foreach ($category->product as $product)
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
                    <h4>Nenhum produto encontrado para essa categoria.</h4>
                </div>
            </div>
            @endif
        </div>
@endsection