@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Datos del proveedor
        </div>
        <div class="card-body">
            <h1>{{ $proveedor->nombre }}</h1>
            <hr>
            <p>{{ $proveedor->descripcion }}</p>
        </div>
    </div>


@endsection
