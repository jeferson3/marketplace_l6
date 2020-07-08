@extends('template.app')

@section('root')
    <div class="row justify-content-center">
        @foreach ($products as $product)
            <div class="col-md-4">
                <div class="card m-2" style="width: 99%;">
                    @if ($product->photo->count())
                        <img class="card-img-top" src="{{ asset('storage/'.$product->photo->first()->image) }}" style="height: 200px;">
                    @else
                        <img class="card-img-top" src="{{ asset('assets/no-photo.jpg') }}" style="height: 200px;">
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
            </div>
        @endforeach
    </div>
@endsection
