@extends('template.app')
@section('title', 'Create Store')
@section('root')
    <h1>Criar loja</h1>
    <form action="{{ route('stores.store') }}" method="POST">
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
            <label for="mobile_phone">Celular</label>
            <input type="text" class="form-control" name="mobile_phone" id="mobile_phone">
        </div>
        <div  class="form-group">
            <label for="phone">Telefone</label>
            <input type="text" class="form-control" name="phone" id="phone">
        </div>
        <div  class="form-group">
            <label for="slug">Slug</label>
            <input type="text" class="form-control" name="slug" id="slug">
        </div>
        <div  class="form-group">
            <label for="user">Usuário</label>
            <select name="user" class="form-control" id="user">
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div  class="form-group">
            <button type="submit" class="btn btn-outline-primary">Criar loja</button>
        </div>
    </form>
@endsection
