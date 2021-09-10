@extends('layouts.control')

@section('admin')
    <div class="card col-md-12 mx-auto">
        <div class="card-header">
            Agregar productos
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('productos.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required
                                    value="{{ old('nombre') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input id="imagen" type="file" class="form-control " name="imagen"
                                    value="{{ old('imagen') }}" autofocus />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" type="textarea" class="form-control" name="descripcion"
                                    autofocus>{{ old('descripcion') }} </textarea>
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
                                            <option value="{{ $c->id }}">{{ $c->nombre }}</option>
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
                                            <option value="{{ $d->id }}">{{ $d->nombre }}</option>
                                        @empty
                                            <option value="#" disabled>Sin departamento</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="mayoreo">Precio Mayoreo:</label>
                                    <input type="number" class="form-control" id="mayoreo" name="mayoreo" required
                                        value="{{ old('mayoreo') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="menudeo">Precio Menudeo:</label>
                                    <input type="number" class="form-control" id="menudeo" name="menudeo" required
                                        value="{{ old('menudeo') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="unitario">unitario:</label>
                                    <input type="number" class="form-control" id="unitario" name="unitario" required
                                        value="{{ old('unitario') }}">
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
                                        value="{{ old('oferta') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_inicial">Fecha inicial:</label>
                                    <input type="date" class="form-control" id="fecha_inicial" name="fecha_inicial" required
                                        value="{{ old('fecha_inicial') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha_final">Fecha Final:</label>
                                    <input type="date" class="form-control" id="fecha_final" name="fecha_final" required
                                        value="{{ old('fecha_final') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="stock">stock:</label>
                                    <input type="text" class="form-control" id="stock" name="stock" required
                                        value="{{ old('stock') }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="provider_id">Proveedor:</label>
                                    <select class="form-control" name="provider_id" id="provider_id">
                                        <option selected disabled>Seleccione un proveedor</option>
                                        @forelse ($proveedores as $p)
                                            <option value="{{ $p->id }}">{{ $p->nombre }}</option>
                                        @empty
                                            <option value="#" disabled>Sin proveedores</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="fecha">Fecha de Registro:</label>
                                    <input type="date" class="form-control" id="fecha" name="fecha" required
                                        value="{{ old('fecha') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary mx-auto">Agregar</button>
            </form>
        </div>
    </div>


@endsection
