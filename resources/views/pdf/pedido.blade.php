<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }

    </style>
</head>

<body>
    <h1># de pedido: {{ $idPedido }}</h1>
    <h2>{{ $pedido->user->name }} {{ $pedido->user->apellidoP }} {{ $pedido->user->apellidoM }}</h2>
    <h3>{{ $pedido->user->direccion }} | {{ $pedido->user->telefono }}</h3>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered" id="myTable" style="width:100%">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    {{ $total = 0 }}
                    @foreach ($pedido->products as $pp)
                        <tr>
                            <td>{{ $pp->nombre }}</td>
                            <td>{{ $pp->pivot->cantidad }}</td>
                            <td>{{ $pp->pivot->monto }}</td>
                            {{ $total += $pp->pivot->monto }}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <h1>TOTAL: {{ $total }}</h1>
        </div>
    </div>

</body>

</html>
