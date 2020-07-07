@extends('template.app')
@section('title', 'Create Product')
@section('root')

    <div class="row">
        <a href="{{ url()->previous() }}" style="text-decoration: none;">
            <i class="fas fa-arrow-left my-auto mx-2"></i>
            Voltar

        </a>
    </div>
    <h1>Criar Produto</h1>
    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div  class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name">
            @error('name')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div  class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="description" id="description">
            @error('description')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div  class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="price" id="price">
            @error('price')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        
        <div  class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="slug" id="slug">
            @error('slug')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div  class="form-group">
            <label for="body">Conteúdo</label>
            <textarea type="text" rows="5" class="form-control @error('name') is-invalid @enderror" name="body" id="body"></textarea>
            @error('body')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div class="form-group">
            <label for="categories">Categorias</label>
            <select class="form-control" name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>


        <div  class="form-group">
            <input type="file" class="@error('name') is-invalid @enderror" name="photos[]" id="photos" multiple>
            @error('photos')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Criar produto</button>
        </div>
    </form>
@endsection
