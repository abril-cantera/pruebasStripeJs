<!-- comprar_productos.blade.php -->

@extends('layouts.index')

@section('content')
    <h1>Productos disponibles:</h1>
    <ul>
        <li>Producto 1 - $10</li>
        <li>Producto 2 - $20</li>
        <li>Producto 3 - $30</li>
    </ul>
    <a href="{{ route('pago.mostrar_formulario') }}" class="btn btn-primary">Pagar</a>
@endsection
