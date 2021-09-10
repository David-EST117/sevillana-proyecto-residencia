@extends('layouts.control')

@section('admin')
    <div class="card col-md-12 mx-auto">
        <div class="card-header">
            Agregar Cliente
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('clientes.store') }}">
                @csrf
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="name" class="">{{ __('Nombre') }}</label>

                                <div class="">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="apellidoP" class=" ">{{ __('Apellido Paterno') }}</label>

                                <div class="">
                                    <input id="apellidoP" type="text"
                                        class="form-control @error('apellidoP') is-invalid @enderror" name="apellidoP"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('apellidoP')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="apellidoM" class="">{{ __('Apellido Materno') }}</label>

                                <div class="">
                                    <input id="apellidoM" type="text"
                                        class="form-control @error('apellidoM') is-invalid @enderror" name="apellidoM"
                                        value="{{ old('name') }}" autocomplete="name" autofocus>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="direccion" class="">{{ __('Dirección') }}</label>

                                <div class="">
                                    <input id="direccion" type="text"
                                        class="form-control @error('direccion') is-invalid @enderror" name="direccion"
                                        value="{{ old('direccion') }}" required autocomplete="direccion" autofocus>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="telefono" class="">{{ __('Teléfono') }}</label>
                                <div class="">
                                    <input id="telefono" type="text"
                                        class="form-control @error('telefono') is-invalid @enderror" name="telefono"
                                        value="{{ old('telefono') }}" required autocomplete="telefono" autofocus>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="email" class="">{{ __('Correo Electrónico') }}</label>

                                <div class="">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" required autocomplete="email">


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="tipo" class="">{{ __('Tipo') }}</label>

                                <div class="">
                                    <select class="form-control" name="tipo" id="tipo">
                                        <option value="" selected disabled>Seleccione tipo de cliente</option>
                                        <option value="frecuente">Frecuente</option>
                                        <option value="otro">otro</option>
                                    </select>


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="password" class="">{{ __('Contraseña') }}</label>

                                <div class="">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">


                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="password-confirm" class="">{{ __('Repetir Contraseña') }}</label>

                                <div class="">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="form-group ">
                    <div class="">
                        <button type="submit" class="btn btn-primary col-md-6 offset-md-3 my-4">
                            {{ __('Registrar cliente') }}
                        </button>
                    </div>

                </div>
            </form>
        </div>
    </div>


@endsection
