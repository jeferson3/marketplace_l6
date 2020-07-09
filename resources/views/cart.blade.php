@extends('template.app')

@section('root')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Carrinho decompras</h2>
        </div>
        <div class="col-md-8">
            @if ($cart)
            <table class="table table-striped my-4">
                <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Quantidade</th>
                        <th>Subtotal</th>
                        <th>Ação</th>
                    </tr>
                </thead>
                <tbody>

                    @php $total = 0; @endphp

                    @foreach ($cart as $c)
                        <tr>
                            <td>{{ $c['name'] }}</td>
                            <td>R${{ number_format($c['price'],2,',','.') }}</td>
                            <td>{{ $c['amount'] }}</td>

                            @php 
                                $subtotal = $c['price'] * $c['amount'];
                                $total += $subtotal;
                            @endphp

                            <td>R${{ number_format($subtotal, 2, ',', '.') }}</td>
                            <td>
                                <a href="{{route('cart.remove', $c['slug'])}}" class="btn">
                                    <i class="fas fa-trash-alt text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td colspan="3">Total</td>
                        <td colspan="2">R${{ number_format($total, 2, ',','.') }}</td>
                    </tr>
                </tbody>
            </table>
            <hr>
            <div class="col-md-12">
                <a href="" class="btn btn-success float-left">Finalizar compra</a>
                <a href="{{ route('cart.cancel') }}" class="btn btn-danger float-right">Cancelar compra</a>
                
            </div>
            @else
                <div class="alert alert-warning alert-important my-5" role="alert">
                    Carrinho vazio...
                </div>
            @endif
        </div>
    </div>
@endsection