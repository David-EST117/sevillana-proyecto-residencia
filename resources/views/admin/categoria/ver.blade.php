@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Datos de la categoría
        </div>
        <div class="card-body">
            <h1>{{ $categoria->nombre }}</h1>
            <hr>
            <p>{{ $categoria->descripcion }}</p>
        </div>
    </div>


@endsection
