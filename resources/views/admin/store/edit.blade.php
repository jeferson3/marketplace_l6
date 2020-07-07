@extends('template.app')
@section('title', 'Edit Store')

@section('root')
<div class="row">
    <a href="{{ route('stores.index') }}" style="text-decoration: none;">
        <i class="fas fa-arrow-left my-auto mx-2"></i>
        Voltar
    </a>
</div>

<h1>Editar Loja</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('stores.update', $store->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')  
            <div class="form-group">
                <img src="{{ asset('storage') .'/'. $store->logo }}" style="width: 100%; height: 300px; border:1px solid grey; border-radius: 5px;">
            </div>          
            <div  class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control @error('')is-invalid @enderror" name="name" id="name" value="{{ $store->name }}">
                @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div  class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control @error('')is-invalid @enderror" name="description" id="description" value="{{ $store->description }}">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div  class="form-group">
                <label for="mobile_phone">Celular</label>
                <input type="text" class="form-control @error('')is-invalid @enderror" name="mobile_phone" id="mobile_phone" value="{{ $store->mobile_phone }}">
                @error('mobile_phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div  class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" class="form-control @error('')is-invalid @enderror" name="phone" id="phone" value="{{ $store->phone }}">
                @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div  class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control @error('')is-invalid @enderror" name="slug" id="slug" value="{{ $store->slug }}">
                @error('slug')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div  class="form-group">
                <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="logo">
                @error('logo')
                    <small class="invalid-feedback">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            
            <div  class="form-group my-4">
                <button type="submit" class="btn btn-outline-primary">Atualizar loja</button>
            </div>
        </form> 
    </div>
    </div>
    
@endsection