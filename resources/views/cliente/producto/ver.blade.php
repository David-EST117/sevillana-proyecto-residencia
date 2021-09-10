@extends('layouts.controlcliente')

@section('cliente')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Datos del Producto
        </div>
        <div class="card-body">
            <h1>{{ $productos->nombre }}</h1>
            <hr>
            <img src="{{ $productos->imagen }}" class="card-img-top" alt="imagen del producto">
            <hr>
            <h5>Descripcion:</h5>
            <p>{{ $productos->descripcion }}</p>
            <h5>Precio por producto:</h5>
            <p>{{ $productos->price->unitario}}</p>
            <h5>Precio por menudeo:</h5>
            <p>{{ $productos->price->menudeo }}</p>
            <h5>Precio por caja:</h5>
            <p>{{ $productos->price->mayoreo }}</p>
        </div>
    </div>


@endsection