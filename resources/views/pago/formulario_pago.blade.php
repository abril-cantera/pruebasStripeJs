<!-- formulario_pago.blade.php -->

@extends('layouts.index')

@section('content')
    <h1>Ingrese la información de su tarjeta:</h1>
    @csrf
    <form action="{{ route('pago.exito') }}" method="POST" id="payment-form">
        <div class="form-group">
            <label for="card-element">
                Tarjeta de crédito/débito:
            </label>
            <div id="card-element">
                <!-- Elemento donde se insertará el formulario de tarjeta de Stripe -->
            </div>
            <div id="card-errors" role="alert"></div>
        </div>
        <button type="submit" class="btn btn-primary">Pagar</button>
    </form>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('{{ env('STRIPE_KEY') }}');
    </script>

    <script>
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        cardElement.on('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(cardElement).then(function(result) {
                if (result.error) {
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Aquí puedes enviar el token de pago a tu servidor para procesarlo
                }
            });
        });
    </script>
@endsection
