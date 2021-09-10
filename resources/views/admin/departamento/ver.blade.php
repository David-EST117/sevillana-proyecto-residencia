@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Datos del departamento
        </div>
        <div class="card-body">
            <h1>{{ $departamento->nombre }}</h1>
            <hr>
            <p>{{ $departamento->descripcion }}</p>
        </div>
    </div>


@endsection
