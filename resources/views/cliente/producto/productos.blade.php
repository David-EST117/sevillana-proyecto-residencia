@extends('layouts.controlcliente')

@section('cliente')

    <div class="card">
        <div class="card-header">
            Listado de en existencia.
        </div>
        <div class="card-body">
            <div class="row">


            </div>
            <table class="table " id="myTable">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Descripcion</th>
                        <th>Mayoreo</th>
                        <th>Menudeo</th>
                        <th>oferta</th>
                        <th>Fecha inicial</th>
                        <th>Fecha Final</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $p )
                        <tr>
                            <td>{{ $p->nombre }}</td>
                            <td><img src="{{ $p->imagen }}" alt="imagen del producto" width="60px" heigth="40px"></td>
                            <td>{{ $p->descripcion }}</td>
                            <td>{{ $p->price->mayoreo }}</td>
                            <td>{{ $p->price->menudeo }}</td>
                            <td>{{ $p->price->oferta }}</td>
                            <td>{{ $p->price->fecha_inicial }}</td>
                            <td>{{ $p->price->fecha_final }}</td>
                            <td class="td-actions text-right mx-auto">
                                <a href="{{route('productoapi.show',$p->id)}}" class="btn btn-info">Ver
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
