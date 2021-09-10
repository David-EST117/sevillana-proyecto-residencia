@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Editar categoría
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('departamentos.update', $departamento->id) }}">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required
                        value="{{ old('nombre', $departamento->nombre) }}">

                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" type="textarea" class="form-control col-md-12" name="descripcion" autofocus>
                    {{ old('descripcion', $departamento->descripcion) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary mx-auto">Editar</button>
            </form>
        </div>
    </div>


@endsection
