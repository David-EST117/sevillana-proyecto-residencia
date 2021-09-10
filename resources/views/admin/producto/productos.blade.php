@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de productos
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Agregar Productos <a class="btn btn-primary btn-sm"
                        href="{{ route('productos.create') }}">+</a>
                </h5>

            </div>
            <table class="table table-responsive" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Mayoreo</th>
                        <th>Menudeo</th>
                        <th>Unitario</th>
                        <th>oferta</th>
                        <th>Fecha inicial</th>
                        <th>Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $p)
                        <tr>
                            <td scope="row">{{ $p->id }}</td>
                            <td>{{ $p->nombre }}</td>
                            <td><img src="{{ $p->imagen }}" alt="imagen del producto" width="60px" heigth="40px"></td>
                            <td>{{ $p->descripcion }}</td>
                            <td>{{ $p->price->mayoreo }}</td>
                            <td>{{ $p->price->menudeo }}</td>
                            <td>{{ $p->price->unitario }}</td>
                            <td>{{ $p->price->oferta }}</td>
                            <td>{{ $p->price->fecha_inicial }}</td>
                            <td>{{ $p->price->fecha_final }}</td>
                            <td class="td-actions text-right mx-auto">
                                <a href="{{ route('productos.show', $p->id) }}" class="btn btn-info">Ver
                                </a>
                                <a href="{{ route('productos.edit', $p->id) }}" class="btn btn-warning " type="button">
                                    Editar
                                </a>
                            </td>
                        </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
