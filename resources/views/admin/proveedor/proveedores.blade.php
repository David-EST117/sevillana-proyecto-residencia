@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de Proveedores
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Agregar Proveedor <a class="btn btn-primary btn-sm"
                        href="{{ route('proveedores.create') }}">+</a>
                </h5>

            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($proveedores as $p)
                        <tr>
                            <td scope="row">{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td>{{ $p->descripcion }}</td>
                            <td>{{ $p->tipo }}</td>
                            <td class="td-actions text-right mx-auto">
                                <a href="{{ route('proveedores.show', $p->id) }}" class="btn btn-info">Ver
                                </a>
                                <a href="{{ route('proveedores.edit', $p->id) }}" class="btn btn-warning " type="button">
                                    Editar
                                </a>
                            </td>
                            <td class="td-actions text-left mx-auto ">
                                <form action="{{ route('proveedores.destroy', $p->id) }}" method="post">
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
