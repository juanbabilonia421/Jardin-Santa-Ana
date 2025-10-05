@extends('layouts.user-auth')

@section('content')
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row mt-lg-n10 mt-md-n11 mt-n10">
                    <!-- Formulario de Registro -->
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card mt-12">
                            <div class="card-header text-center pt-4">
                                <h5 class="text-success text-gradient">Registrarse</h5>
                            </div>

                            <!-- Iconos de Inicio de Sesión Social -->
                            <div class="row px-xl-5 px-sm-4 px-3">
                                <div class="col-3 ms-auto px-1">
                                    <a class="btn btn-outline-light w-100" href="javascript:;">
                                        <!-- Facebook -->
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                            <circle fill="#3C5A9A" cx="32" cy="32" r="30"></circle>
                                            <path d="M39,22h-4c-2,0-3,1-3,3v4h7l-1,7h-6v17h-7V36h-5v-7h5v-5c0-5,3-9,9-9h6v7z" fill="#FFF"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-3 px-1">
                                    <a class="btn btn-outline-light w-100" href="javascript:;">
                                        <!-- Apple -->
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#000000" d="M41 33c0 9 8 12 8 12s-2 8-7 14c-4 6-7 7-9 7s-5-1-9-1-6 1-9 1-5-2-9-7-7-12-7-20c0-10 7-16 14-16 5 0 7 3 11 3s7-3 11-3c2 0 6 1 9 4-3 2-7 6-7 12zM33 10c3-4 4-9 4-10-3 0-7 2-9 5-2 2-3 6-2 9 4 0 7-2 7-4z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="col-3 me-auto px-1">
                                    <a class="btn btn-outline-light w-100" href="javascript:;">
                                        <!-- Google -->
                                        <svg width="24px" height="32px" viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg">
                                            <path fill="#4285F4" d="M58 30H32v9h15c-1 5-6 9-15 9-9 0-16-7-16-16s7-16 16-16c4 0 7 2 10 4l7-7C45 8 39 6 32 6 18 6 6 18 6 32s12 26 26 26c15 0 26-11 26-26 0-2 0-4 0-6z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="mt-2 position-relative text-center">
                                    <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                                        o
                                    </p>
                                </div>
                            </div>
                            <!-- Fin de Iconos -->

                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}" role="form" class="text-left">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text" 
                                               class="form-control @error('name') is-invalid @enderror" 
                                               placeholder="Nombre" 
                                               name="name" 
                                               value="{{ old('name') }}" 
                                               required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="email" 
                                               class="form-control @error('email') is-invalid @enderror" 
                                               placeholder="Correo Electrónico" 
                                               name="email" 
                                               value="{{ old('email') }}" 
                                               required>
                                        @error('email')
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" 
                                               class="form-control @error('password') is-invalid @enderror" 
                                               placeholder="Contraseña" 
                                               name="password" 
                                               required>
                                        @error('password')
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <input type="password" 
                                               class="form-control" 
                                               placeholder="Confirmar Contraseña" 
                                               name="password_confirmation" 
                                               required>
                                    </div>

                                    <div class="form-check form-check-info text-left">
                                        <input class="form-check-input" type="checkbox" value="1" id="flexCheckDefault" required>
                                        <label class="form-check-label" for="flexCheckDefault">
                                            Yo acepto los 
                                            <a href="javascript:;" class="text-success text-gradient font-weight-bolder">
                                                términos y condiciones
                                            </a>
                                        </label>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-success w-100 my-4 mb-2">
                                            Registrarse
                                        </button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">
                                        ¿Ya tienes una cuenta? 
                                        <a href="{{ route('login') }}" class="text-success text-gradient font-weight-bolder">
                                            Iniciar sesión
                                        </a>
                                    </p>
                                </form>
                            </div>
                        </div>
                        <p class="text-secondary text-center pt-5">
                            Copyright © 
                            <script>document.write(new Date().getFullYear())</script> 
                            Registrarse - Santa Ana
                        </p>
                    </div>

                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n9" 
                                 style="background-image:url('{{ asset('assets/img/curved-images/curved45.jpg') }}')">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
