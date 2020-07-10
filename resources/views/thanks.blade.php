@extends('template.front')

@section('root')
    <div class="container">
        <div class="alert alert-success alert-important">
            <h2>Obrigado pela compra</h2>
        </div>
        <hr>
        <h3>Pedido: 54164211849266AB</h3>
        <hr>
        <a href="{{route('home')}}">Home</a>
    </div>

@endsection