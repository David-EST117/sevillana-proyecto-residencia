@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Editar proveedor
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('proveedores.update', $proveedor->id) }}">
                @csrf
                @method("PUT")
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required
                        value="{{ old('nombre', $proveedor->nombre) }}">

                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" type="textarea" class="form-control col-md-12" name="descripcion" autofocus>
                    {{ old('descripcion', $proveedor->descripcion) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" id="tipo" class="form-control col-md-12">
                        <option value="" disabled selected>Seleccione tipo</option>
                        <option value="1">tipo uno</option>
                        <option value="2">tipo dos</option>

                    </select>
                </div>

                <button type="submit" class="btn btn-primary mx-auto">Editar</button>
            </form>
        </div>
    </div>


@endsection
