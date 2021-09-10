@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Datos del producto
        </div>
        <div class="card-body">
            <h1>{{ $producto->nombre }}</h1>
            <hr>
            <img src="{{ $producto->imagen }}" class="card-img-top" alt="imagen del producto">
            <hr>
            <h5>Descripcion del producto:</h5>
            <p>{{ $producto->descripcion }}</p>
            <h5>Precio por producto:</h5>
            <p>{{ $producto->price->unitario}}</p>
            <h5>Precio por menudeo:</h5>
            <p>{{ $producto->price->menudeo }}</p>
            <h5>Precio por caja:</h5>
            <p>{{ $producto->price->mayoreo }}</p>
        </div>
    </div>


@endsection
