@extends('layouts.controlcliente')

@section('cliente')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Realizar pedido
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('apipedidos.store') }}">
                @csrf
                <div class="form-group">
                    <label for="ruta">Ruta:</label>
                    <input type="text" class="form-control" id="ruta" name="ruta" required value="{{ old('ruta') }}">
                </div>
                <button type="submit" class="btn btn-primary mx-auto">Hacer Pedido</button>
            </form>
        </div>
    </div>


@endsection
