@extends('template.app')
@section('title', 'List Products')
@section('root')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-group">
        <a class="btn btn-success" href="{{ route('products.create') }}">Cadastrar produto</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Produto</th>
                    <th>Descrição</th>
                    <th>Loja</th>
                    <th width=150>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                    @isset($products)
                        @foreach($products->all() as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>   
                                <td>{{ $product->store->name }}</td>   
                                <td>{{ 'R$'.number_format($product->price, 2, ',', '.') }}</td>   
                                <td class="row form-inline p-1">
                                        <a href="{{ route('products.edit', $product->id) }}">
                                            <i class="fas fa-edit fas-2x text-primary"></i>
                                        </a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn">
                                                <i class="fas fa-trash-alt fas-2s text-primary"></i>
                                            </button>
                                        </form>
                                </td> 
                            </tr>    
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $products->links() }}
    </div>
@endsection