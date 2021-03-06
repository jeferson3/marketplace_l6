@extends('template.front')

@section('root')

    <div class="row justify-content-center">
        <div class="col-md-5">
            @if ($product->photo->count())
                <img class="img-fluid thumb" src="{{ asset('storage/'.$product->photo->first()->image) }}" style="height:300px; width:100%;">
                <div class="row mt-2 justify-content-center">
                    @foreach ($product->photo as $key => $photo)
                        @if ($key == 3)
                            @break
                        @endif
                        <div class="col-4">
                            <img class="img-fluid small" src="{{ asset('storage/'.$photo->image) }}" style="height:80%; width:100%;">
                        </div>
                    @endforeach
                </div>
            @else
                <img class="img-fluid" src="{{ asset('assets/no-photo.jpg') }}" style="height: 200px;">
            @endif
        </div>
        <div class="col-md-7">
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

@section('scripts')
    <script>
        let thumb = document.querySelector('.thumb');
        let small = document.querySelectorAll('.small');

        small.forEach(el => {
            el.addEventListener('click', function(){
                let aux = el.src;
                thumb.src = aux;

            });
        });
    </script>
@endsection









