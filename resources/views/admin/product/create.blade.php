@extends('template.app')
@section('title', 'Create Store')
@section('root')
    <h1>Criar Produto</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        
        <div  class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name">
        </div>
        <div  class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description">
        </div>
        <div  class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control" name="price" id="price">
        </div>
        
        <div  class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug">
        </div>
        <div  class="form-group">
            <label for="body">Conteúdo</label>
            <textarea type="text" rows="5" class="form-control" name="body" id="body"></textarea>
        </div>
        <div  class="form-group">
            <label for="store">Usuário</label>
            <select name="store" class="form-control" id="store">
                @foreach ($stores as $store)
                    <option value="{{ $store->id }}">{{ $store->name }}</option>
                @endforeach
            </select>
        </div>
        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Criar produto</button>
        </div>
    </form>
@endsection
