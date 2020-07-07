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
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
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
            <input type="file" class="@error('name') is-invalid @enderror" name="photos[]" id="photos" multiple>
            @error('photos')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div class="row justify-content-center">
            @foreach ($product->photo as $photo)
                <div class="col-sm-4">
                    <div class="form-group">
                        <img class="img-fluid" src="{{ asset('storage').'/'.$photo->image  }}" style="width:200px;height:150px;border-radius:5px;">
                        <form action="{{route('photos.remove', $photo->image)}}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-times"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Atualizar produto</button>
        </div>
    </form>

    
@endsection