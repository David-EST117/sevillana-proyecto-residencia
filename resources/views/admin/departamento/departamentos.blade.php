@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de Departamentos
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Agregar Departamento <a class="btn btn-primary btn-sm"
                        href="{{ route('departamentos.create') }}">+</a>
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
                    @forelse($departamentos as $d)
                        <tr>
                            <td scope="row">{{ $d->id }}</td>
                            <td>{{ $d->nombre }}</td>
                            <td>{{ $d->descripcion }}</td>
                            <td class="td-actions text-right mx-auto">
                                <a href="{{ route('departamentos.show', $d->id) }}" class="btn btn-info">Ver
                                </a>
                                <a href="{{ route('departamentos.edit', $d->id) }}" class="btn btn-warning " type="button">
                                    Editar
                                </a>
                            </td>
                            <td class="td-actions text-left mx-auto ">
                                <form action="{{ route('departamentos.destroy', $d->id) }}" method="post">
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
