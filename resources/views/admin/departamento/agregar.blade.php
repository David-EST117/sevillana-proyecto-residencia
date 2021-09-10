@extends('layouts.control')

@section('admin')
    <div class="card col-md-6 mx-auto">
        <div class="card-header">
            Agregar departamento
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('departamentos.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required value="{{ old('nombre') }}">

                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea id="descripcion" type="textarea" class="form-control col-md-12" name="descripcion"
                        value="{{ old('descripcion') }}" autofocus> </textarea>
                </div>

                <button type="submit" class="btn btn-primary mx-auto">Agregar</button>
            </form>
        </div>
    </div>


@endsection
