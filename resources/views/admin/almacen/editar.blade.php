@extends('layouts.control')

@section('admin')
    <div class="card col-md-12 mx-auto">
        <div class="card-header">
            Editar en almacen
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('almacenes.update', $almacen->id) }}">
                @csrf
                @method("PUT")
                <div class="col-md-12 mx-auto">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="stock">stock:</label>
                                <input type="text" class="form-control" id="stock" name="stock" required
                                    value="{{ old('stock', $almacen->stock) }}">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="form-group">
                                <label for="provider_id">Proveedor:</label>
                                <select class="form-control" name="provider_id" id="provider_id">
                                    <option selected disabled>Seleccione un proveedor</option>
                                    @forelse($proveedores as $p)
                                        <option @if ($almacen->provider_id == $p->id)?
                                            selected : @endif value="{{ $p->id }}">{{ $p->nombre }}
                                        </option>

                                    @empty
                                        <option value="#">NO HAY DATOS</option>
                                    @endforelse
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <button type="submit" class="btn btn-primary mx-auto">Editar</button>
            </form>
        </div>
    </div>


@endsection
