@extends('template.app')
@section('title', 'Edit Product')

@section('root')
<div class="row">
    <a href="{{ url()->previous() }}" style="text-decoration: none;">
        <i class="fas fa-arrow-left my-auto mx-2"></i>
        Voltar
    </a>
</div>

<h1>Editar Produto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div  class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}">
        </div>
        <div  class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $product->description }}">
        </div>
        <div  class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}">
        </div>
        
        <div  class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $product->slug }}">
        </div>
        <div  class="form-group">
            <label for="body">Conteúdo</label>
            <textarea type="text" rows="5" class="form-control" name="body" id="body"> {{ $product->body }}</textarea>
        </div>
        <div class="form-group">
            <label for="categories">Categorias</label>
            <select class="form-control" name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category->contains($category)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Atualizar produto</button>
        </div>
    </form>

    
@endsection