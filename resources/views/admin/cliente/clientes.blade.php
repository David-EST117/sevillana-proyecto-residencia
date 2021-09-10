@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de Clientes
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Agregar Cliente <a class="btn btn-primary btn-sm"
                        href="{{ route('clientes.create') }}">+</a>
                </h5>

            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Dirección</th>
                        <th>Teléfono</th>
                        <th>Tipo</th>
                        <th>email</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($clientes as $c)
                        @if ($c->hasRole('cliente'))
                            <tr>
                                <td scope="row">{{ $c->id }}</td>
                                <td>{{ $c->name }}</td>
                                <td>{{ $c->apellidoP }} {{ $c->apellidoM }}</td>
                                <td>{{ $c->direccion }}</td>
                                <td>{{ $c->telefono }}</td>
                                <td>{{ $c->tipo }}</td>
                                <td>{{ $c->email }}</td>
                                <td class="td-actions text-right mx-auto">
                                    <a href="{{ route('clientes.show', $c->id) }}" class="btn btn-info">Ver
                                    </a>
                                </td>
                                <td class="td-actions text-left mx-auto ">
                                    <form action="{{ route('clientes.destroy', $c->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger  btn-delete" type="submit" rel="tooltip">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endif
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
