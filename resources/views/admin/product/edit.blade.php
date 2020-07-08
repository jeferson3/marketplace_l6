@extends('template.app')
@section('title', 'Edit Product')

@section('root')
<div class="row">
    <a href="{{ route('products.index') }}" style="text-decoration: none;">
        <i class="fas fa-arrow-left my-auto mx-2"></i>
        Voltar
    </a>
</div>

<h1>Editar Produto</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div  class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $product->name }}">
            @error('name')
                {{$message}}
            @enderror
        </div>
        <div  class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description" value="{{ $product->description }}">
            @error('description')
            {{$message}}
            @enderror
        </div>
        <div  class="form-group">
            <label for="price">Preço</label>
            <input type="text" class="form-control @error('price') is-invalid @enderror" name="price" id="price" value="{{ $product->price }}">
            @error('price')
            {{$message}}
            @enderror
        </div>
        
        <div  class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ $product->slug }}">
            @error('slug')
            {{$message}}
            @enderror
        </div>
        <div  class="form-group">
            <label for="body">Conteúdo</label>
            <textarea type="text" rows="5" class="form-control @error('body') is-invalid @enderror" name="body" id="body"> {{ $product->body }}</textarea>
            @error('body')
            {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="categories">Categorias</label>
            <select class="form-control @error('categories') is-invalid @enderror" name="categories[]" multiple>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @if($product->category->contains($category)) selected @endif>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('categories')

            @enderror
        </div>

        <div  class="form-group">
            <input type="file" class="form-control-file @error('photos.*') is-invalid @enderror" name="photos[]" id="photos" multiple>
            @error('photos.*')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary my-4">Atualizar produto</button>
        </div>
    </form>
    <h4>Fotos do produto:</h4>
    <div class="row justify-content-center">
        @foreach ($product->photo as $photo)
            <div class="col-sm-4 text-center">
                <div class="form-group">
                    <img class="img-fluid" src="{{ asset('storage').'/'.$photo->image  }}" style="width:200px;height:150px;border-radius:5px;">

                    <form action="{{ route('photos.remove')}}" method="post">
                        @csrf

                        <input type="hidden" name="photoName" value="{{ $photo->image }}">

                        <button type="submit" class="btn btn-danger my-1">
                            <i class="fas fa-times"></i>
                        </button>
                    </form>

                </div>
            </div>
        @endforeach
    </div>
    
@endsection