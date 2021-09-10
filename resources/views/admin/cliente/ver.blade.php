@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Datos del cliente
        </div>
        <div class="card-body">
            <h5>Nombre:</h5>
            <h3>{{ $cliente->name }}</h3>
            <hr>
            <h5>Apellido Paterno:</h5>
            <p>{{ $cliente->apellidoP }}</p>
            <hr>
            <h5>Apellido Materno:</h5>
            <p>{{ $cliente->apellidoM }}</p>
            <hr>
            <h5>Direccion:</h5>
            <p>{{ $cliente->direccion }}</p>
            <hr>
            <h5>Telefono:</h5>
            <p>{{ $cliente->telefono }}</p>
        </div>
    </div>


@endsection
