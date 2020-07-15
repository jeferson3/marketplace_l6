@extends('template.front')

@section('root')
    <div class="container">
        <div class="col-md-12">
            <form class="form" action="{{route('checkout.order')}}" method="POST">
                @csrf
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h2>Dados pagamento</h2>
                        <p class="text-danger">Metodo de pagamento não disponível</p>
                        <hr>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-10 form-group">
                        <label for="">Número do cartão</label>
                        <input type="text" class="form-control" name="card_number">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-md-5 form-group">
                        <label for="">Mês de Expiração</label>
                        <input type="text" class="form-control" name="card_month">
                    </div>
                    <div class="col-md-5 form-group">
                        <label for="">Ano de Expiração</label>
                        <input type="text" class="form-control" name="card_year">
                    </div>
                </div>
                <div class="row justify-content-center align-items-end">
                    <div class="col-md-5">
                        <label for="">Código de Segurança</label>
                        <input type="text" class="form-control" name="card_cvv">
                    </div>
                    <div class="col-md-5 mt-2">
                        <button type="submit" class="btn btn-success payment">Efetuar pagamento</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        document.querySelector('.form')
        .addEventListener('submit', function(e) {

            e.preventDefault();
            let btnSubmit = document.querySelector('button.btn');

            setTimeout(function() {
                
                document.querySelector('.form').submit();
            }, 3000)

            btnSubmit.innerHTML = 'Carregando...';
            btnSubmit.setAttribute('disabled', 'disabled');
            
            toastr.success('Compra realizada com sucesso', 'Sucesso', {timeOut: 3000})
        });
    </script>
@endsection