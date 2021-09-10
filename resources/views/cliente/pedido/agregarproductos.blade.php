@extends('layouts.controlcliente')

@section('cliente')
    <div class="card col-md-10 mx-auto">
        <div class="card-header">
            Agregar Productos al pedido
        </div>
        <div class="card-body">
            <div class="col-md-12">
                <div class="row">

                    <div class="col-md-6 mx-auto">
                        <div class="row mx-auto">
                            <p class="">
                            <h3># DE PEDIDO</h3>
                            </p> <input name="idPedido" id="idPedido" readonly class="form-control col-md-4 mx-4"
                                type="text" value="{{ $idPedido }}">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 mx-auto">
                <button type="button" id="btnAgregarListado" class="btn btn-primary my-3 " data-toggle="modal"
                    data-target="#productosModal">
                    Agregar producto <span class="badge badge-primary"></span>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table class="table text-center " id="myTable">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Monto</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productosPedido->products as $pp)
                            @if ($pp->pivot->cantidad > 0)
                                <tr>
                                    <td>{{ $pp->nombre }}</td>
                                    <td>{{ $pp->pivot->cantidad }}</td>
                                    <td>{{ $pp->pivot->monto }}</td>
                                    <td><a href="{{ route('quitarProducto', [$idPedido, $pp->id]) }}"
                                            class="btn btn-danger">-</a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="col-md-4 mx-auto my-4">

                    @if (count($productosPedido->products) > 0)
                        <a id="terminarPedido" href="{{ route('terminarpedido', $idPedido) }}" target="_blank"
                            class="btn btn-success">Terminar
                            Pedido
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    <a href="{{ route('agregarproductospedido') }}" type="hidden" id="urlagregarproductospedido"></a>
    <!-- Modal -->
    <div class="col-md-12">
        <div class="row">
            <div class="modal fade " id="productosModal" tabindex="-1" role="dialog" aria-labelledby="productosModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="productosModalLabel">Listado de productos</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h2># DE PEDIDO: <span class="badge badge-info">{{ $idPedido }}</span></h2>
                                </div>
                                <div class="col-md-6"><input name="idPedido" id="idPedido" readonly class="form-control"
                                        type="hidden" value="{{ $idPedido }}">
                                </div>
                            </div>
                            <br>
                            <div id="listado"></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@section('js')

    <script src="{{ asset('js/agregarProductos.js') }}"></script>
    <script src="{{ asset('js/terminarPedido.js') }}"></script>
@endsection

@endsection
