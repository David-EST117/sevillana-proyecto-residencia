@extends('layouts.controlcliente')

@section('cliente')

    <div class="card">
        <div class="card-header">
            Listado de mis pedidos
        </div>
        <div class="card-body">
            <div class="row">
                <h5 class="card-title">Realizar pedido<a class="btn btn-primary btn-sm"
                        href="{{ route('apipedidos.create') }}">+</a>
                </h5>
            </div>
            <table class="table text-center" id="myTable">
                <thead>
                    <tr>
                        <th>Ruta</th>
                        <th>Fecha</th>
                        <th>Estatus</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $p )
                        <tr>
                            <td>{{ $p->ruta }}</td>
                            <td>{{ $p->fecha }}</td>
                            <td>
                                @if ($p->estatus == '0')

                                    <div class="p-3 mb-2 bg-secondary text-white">Pendiente
                                        <h5 class="card-title">Agregar Productos <a class="btn btn-primary btn-sm"
                                                href="{{ route('agregarproductos', $p->id) }}">+</a>
                                        </h5>

                                    </div>
                                @elseif ($p->estatus == '1')
                                    <div class="p-3 mb-2 bg-warning text-dark">En Proceso</div>
                                @else
                                    <div class="p-3 mb-2 bg-success text-white">Entregado</div>
                                @endif
                            </td>

                        </tr>
                    @empty

                    @endforelse

                </tbody>
            </table>
        </div>
    </div>

@endsection
