@extends('layouts.control')

@section('admin')
    <div class="card">
        <div class="card-header">
            Listado Pedidos Pendientes
        </div>
        <div class="card-body">
            <table class="table text-center" id="myTable">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Teléfono del Cliente</th>
                        <th>Ruta</th>
                        <th>Fecha del Pedido</th>
                        <th>Estatus</th>

                    </tr>
                </thead>
                <tbody>
                    @forelse($pedidos as $p )
                        <tr>

                            <td>{{ $p->user->name }} {{ $p->user->apellidoP }} {{ $p->user->aPellidoM }}</td>
                            <td>{{ $p->user->telefono }}</td>
                            <td>{{ $p->ruta }}</td>
                            <td>{{ $p->fecha }}</td>
                            <td>
                                @if ($p->estatus == '0')

                                @elseif ($p->estatus == '1')

                                    <div class="p-3 mb-2 bg-secondary text-white">Pendiente
                                        <a id="descargarPedido" target="_blank" href="{{ route('descargarPedido', $p->id) }}"
                                            class="btn btn-primary">Ver Pedido
                                        </a>
                                </div> @else
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

    @section('js')
        <script>
            $("#descargarPedido").click(() => {
                window.location.origin;
                setTimeout(() => {
                    location.reload();
                }, 2000);
            });

        </script>
    @endsection
@endsection
