@extends('template.app')
@section('title', 'Edit Categoria')

@section('root')
    <div class="row">
        <a href="{{ url()->previous() }}" style="text-decoration: none;">
            <i class="fas fa-arrow-left my-auto mx-2"></i>
            Voltar
        </a>
    </div>
    <h1>Editar Categoria</h1>
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div  class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}">
        </div>
        <div  class="form-group">
            <label for="description">Descrição</label>
            <input type="text" class="form-control" name="description" id="description" value="{{ $category->description }}">
        </div>
        <div  class="form-group">
            <label for="description">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug" value="{{ $category->slug }}">
        </div>
        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Atualizar categoria</button>
        </div>
    </form>
@endsection