@extends('layouts.control')

@section('admin')

    <div class="card">
        <div class="card-header">
            Listado de productos en almacen
        </div>
        <div class="card-body">
            <div class="row">
            </div>
            <table class="table table-responsive" id="myTable">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Precio Unitario</th>
                        <th>Stock</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Proveedor</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($almacenes as $a)
                        <tr>
                            <td scope="row">{{ $a->id }}</td>
                            <td>{{ $a->product->nombre }}</td>
                            <td><img src="{{ $a->product->imagen }}" alt="imagen del producto" width="60px" heigth="40px"></td>
                            <td>{{ $a->product->descripcion }}</td>
                            <td>{{ $a->product->price->unitario }}</td>
                            <td>{{ $a->stock }}</td>
                            <td>{{ $a->monto }}</td>
                            <td>{{ $a->fecha }}</td>
                            <td>{{ $a->provider->nombre }}</td>

                            <td class="td-actions text-right mx-auto">
                                <a href="{{ route('almacenes.edit', $a->id) }}" class="btn btn-warning " type="button">
                                    Editar
                                </a>
                            </td>
                            <td class="td-actions text-left mx-auto ">
                                <form action="{{ route('almacenes.destroy', $a->id) }}" method="post">
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
