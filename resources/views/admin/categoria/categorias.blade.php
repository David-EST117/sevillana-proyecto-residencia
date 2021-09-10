@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de Categorías
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Agregar Categoría <a class="btn btn-primary btn-sm"
                        href="{{ route('categorias.create') }}">+</a>
                </h5>
            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($categorias as $c)
                        <tr>
                            <td scope="row">{{ $c->id }}</td>
                            <td>{{ $c->nombre }}</td>
                            <td>{{ $c->descripcion }}</td>
                            <td class="td-actions text-right mx-auto">
                                <a href="{{ route('categorias.show', $c->id) }}" class="btn btn-info">Ver
                                </a>
                                <a href="{{ route('categorias.edit', $c->id) }}" class="btn btn-warning " type="button">
                                    Editar
                                </a>
                            </td>
                            <td class="td-actions text-left mx-auto ">
                                <form action="{{ route('categorias.destroy', $c->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger  btn-delete" type="submit" rel="tooltip">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
