@extends('template.app')
@section('title', 'Create Store')
@section('root')
<div class="row">
        <a href="{{ route('stores.index') }}" style="text-decoration: none;">
            <i class="fas fa-arrow-left my-auto mx-2"></i>
            Voltar
        </a>
    </div>
    <h1>Criar loja</h1>
    <form action="{{ route('stores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div  class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{old('name') }}">
            @error ('name')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div  class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control @error ('description')) is-invalid @enderror" name="description" id="description" value="{{old('description') }}">
            <small class="invalid-feedback">
                @error ('description')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div  class="form-group">
            <label for="mobile_phone">Celular</label>
            <input type="text" class="form-control @error ('mobile_phone')) is-invalid @enderror" name="mobile_phone" id="mobile_phone" value="{{old('mobile_phone') }}">
            <small class="invalid-feedback">
                @error ('mobile_phone')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div  class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control @error ('phone')) is-invalid @enderror" name="phone" id="phone" value="{{old('phone') }}">
            <small class="invalid-feedback">
                @error ('phone')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div  class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control @error ('slug')) is-invalid @enderror" name="slug" id="slug" value="{{old('slug') }}">
            <small class="invalid-feedback">
                @error ('slug')
                    {{ $message }}
                @enderror
            </small>
        </div>
        <div  class="form-group">
            <input type="file" class="form-control-file @error('logo') is-invalid @enderror" name="logo" id="logo">
            @error('logo')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Criar loja</button>
        </div>
    </form>
@endsection
