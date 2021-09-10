@extends('layouts.control')

@section('admin')
    <div class="card col-md-12 mx-auto border-primary">
        <div class="card-header">
            Editar datos del producto
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('productos.update', $producto->id) }}" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required
                                    value="{{ old('nombre', $producto->nombre) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input id="imagen" type="file" class="form-control " name="imagen"
                                    value="{{ old('imagen') }}" autofocus />
                            </div>
                            @if ($producto->imagen != '')
                                <span class="badge badge-info" width="100%">*Contiene una Imagen</span>
                            @endif

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" type="textarea" class="form-control" name="descripcion"
                                    autofocus>{{ old('descripcion', $producto->descripcion) }} </textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="category_id">Categoría:</label>
                                    <select class="form-control" name="category_id" id="category_id">
                                        <option selected disabled>Seleccione una categoría</option>
                                        @forelse ($categorias as $c)
                                            <option @if ($producto->category_id == $c->id) ?
                                                                                                                                                                                                                                                                                                                                                selected : @endif value="{{ $c->id }}">
                                                {{ $c->nombre }}
                                            </option>
                                        @empty
                                            <option value="#" disabled>Sin categorias</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="department_id">Departamento:</label>
                                    <select class="form-control" name="department_id" id="department_id">
                                        <option selected disabled>Seleccione un departamento</option>
                                        @forelse ($departamentos as $d)
                                            <option @if ($producto->department_id == $d->id) ? selected : @endif value="{{ $d->id }}">{{ $d->nombre }}
                                            </option>
                                        @empty
                                            <option value="#" disabled>Sin departamento</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <div class="row"><button type="submit" class="btn btn-primary mx-auto col-md-6">Editar</button></div>
            </form>
        </div>
    </div>
    <br>
    <div class="card col-md-12 mx-auto border-info">
        <div class="card-header">
            Editar precio del producto
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('productos.updatePrice', $producto->price_id) }}"
                enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="col-md-12">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mayoreo">Precio Mayoreo:</label>
                                    <input type="number" class="form-control" id="mayoreo" name="mayoreo" required
                                        value="{{ old('mayoreo', $producto->price->mayoreo) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="menudeo">Precio Menudeo:</label>
                                    <input type="number" class="form-control" id="menudeo" name="menudeo" required
                                        value="{{ old('menudeo', $producto->price->menudeo) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unitario">unitario:</label>
                                    <input type="number" class="form-control" id="unitario" name="unitario" required
                                        value="{{ old('unitario', $producto->price->unitario) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="oferta">Oferta:</label>
                                    <input type="number" class="form-control" id="oferta" name="oferta" required
                                        value="{{ old('oferta', $producto->price->oferta) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_inicial">Fecha inicial:</label>
                                    <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" required
                                        value="{{ old('fecha_inicial', $producto->price->fecha_inicial) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_final">Fecha Final:</label>
                                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" required
                                        value="{{ old('fecha_final', $producto->price->fecha_final) }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row"><button type="submit" class="btn btn-primary mx-auto col-md-6">Editar</button></div>
            </form>
        </div>
    </div>
    <br>

@endsection
