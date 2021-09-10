@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de Precios
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Agregar Precios<a class="btn btn-primary btn-sm"
                        href="{{ route('precios.create') }}">+</a>
                </h5>

            </div>
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Mayoreo</th>
                        <th>Menudeo</th>
                        <th>Unitario</th>
                        <th>Oferta</th>
                        <th>Fecha Inicial</th>
                        <th>Fecha Final</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($precios as $p)
                        <tr>
                            <td scope="row">{{ $p->id }}</td>
                            <td>{{ $p->mayoreo }}</td>
                            <td>{{ $p->menudeo }}</td>
                            <td>{{ $p->unitario }}</td>
                            <td>{{ $p->oferta }}</td>
                            <td>{{ $p->fecha_inicial }}</td>
                            <td>{{ $p->fecha_final }}</td>
                            <td class="td-actions text-right mx-auto">
                                <a href="{{ route('precios.show', $p->id) }}" class="btn btn-info">Ver
                                </a>
                                <a href="{{ route('precios.edit', $p->id) }}" class="btn btn-warning " type="button">
                                    Editar
                                </a>
                            </td>
                            <td class="td-actions text-left mx-auto ">
                                <form action="{{ route('precios.destroy', $p->id) }}" method="post">
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
