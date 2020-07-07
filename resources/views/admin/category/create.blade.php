@extends('template.app')
@section('title', 'Create Category')
@section('root')

    <div class="row">
        <a href="{{ route('categories.index') }}" style="text-decoration: none;">
            <i class="fas fa-arrow-left my-auto mx-2"></i>
            Voltar

        </a>
    </div>
    <h1>Criar Categoria</h1>
    <form action="{{ route('categories.store') }}" method="POST">
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
            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" id="description">
            @error('description')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>
        
        <div  class="form-group">
            <label for="description">Slug</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug">
            @error('slug')
                <small class="invalid-feedback">
                    {{ $message }}
                </small>
            @enderror
        </div>

        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Criar categoria</button>
        </div>
    </form>
@endsection
