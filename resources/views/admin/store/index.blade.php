@extends('template.app')
@section('title', 'Edit Store')
@section('root')
<div class="row justify-content-center">
    <div class="col-md-8">
        <table class="table table-responsive table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th width=300>Loja</th>
                    <th width=300>Decription</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                    @isset($stores)
                        @foreach($stores->all() as $store)
                            <tr>
                                <td>{{ $store->id }}</td>
                                <td>{{ $store->name }}</td>
                                <td>{{ $store->description }}</td>   
                                <td class="row form-inline p-1 m-0">
                                    <a href="{{ route('stores.edit', $store->id ) }}">
                                        <i class="fas fa-edit fas-2x text-primary"></i>
                                    </a>
                                    <form action="{{ route('stores.destroy', $store->id ) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn">
                                            <i class="fas fa-trash-alt fas-2s text-primary"></i>
                                        </button>
                                    </form>
                                </td> 
                            </tr>    
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
    <div class="row justify-content-center">
        {{ $stores->links() }}
    </div>
@endsection