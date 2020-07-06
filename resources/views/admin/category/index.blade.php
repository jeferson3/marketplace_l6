@extends('template.app')
@section('title', 'List Category')
@section('root')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="form-group">
        <a class="btn btn-success" href="{{ route('categories.create') }}">Cadastrar categoria</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Categoria</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->description ?? 'Sem descrição' }}</td> 
                                
                                <td class="row form-inline p-1">
                                        <a href="{{ route('categories.edit', $category->id) }}">
                                            <i class="fas fa-edit fas-2x text-primary"></i>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn">
                                                <i class="fas fa-trash-alt fas-2s text-primary"></i>
                                            </button>
                                        </form>
                                </td> 
                            </tr>    
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection