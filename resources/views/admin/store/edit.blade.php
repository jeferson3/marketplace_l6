@extends('template.app')
@section('title', 'Edit Store')

@section('root')
<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="{{ route('stores.update', $store->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div  class="form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $store->name }}">
            </div>
            <div  class="form-group">
                <label for="description">Descrição</label>
                <input type="text" class="form-control" name="description" id="description" value="{{ $store->description }}">
            </div>
            <div  class="form-group">
                <label for="mobile_phone">Celular</label>
                <input type="text" class="form-control" name="mobile_phone" id="mobile_phone" value="{{ $store->mobile_phone }}">
            </div>
            <div  class="form-group">
                <label for="phone">Telefone</label>
                <input type="text" class="form-control" name="phone" id="phone" value="{{ $store->phone }}">
            </div>
            <div  class="form-group">
                <label for="slug">Slug</label>
                <input type="text" class="form-control" name="slug" id="slug" value="{{ $store->slug }}">
            </div>
            
            <div  class="form-group">
                <button type="submit" class="btn btn-outline-primary">Atualizar loja</button>
            </div>
        </form> 
    </div>
    </div>
    <div class="row justify-content-center">
    </div>
@endsection