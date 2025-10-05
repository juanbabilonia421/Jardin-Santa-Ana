@extends('layouts.user-auth')

@section('content')
    <section>
        <div class="page-header min-vh-100">
            <div class="container">
                <div class="row">
                    <!-- Login Form -->
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Bienvenido de nuevo</h3>
                                <p class="mb-0">Ingresa tu correo electrónico y contraseña para iniciar sesión</p>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" role="form">
                                    @csrf
                                    <label>Correo electrónico</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" name="email" aria-label="Email" aria-describedby="email-addon">
                                        @error('email')
                                            <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label>Contraseña</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" name="password" aria-label="Password" aria-describedby="password-addon">
                                        @error('password')
                                        <span class="invalid-feedback text-xs" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="rememberMe">Recuérdame</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Iniciar sesión</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                <p class="mb-4 text-sm mx-auto">
                                    ¿No tienes una cuenta?
                                    <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Regístrate</a>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-info text-gradient" href="{{ route('password.request') }}">
                                            {{ __('¿Olvidaste tu contraseña?') }}
                                        </a>
                                    @endif
                                </p>
                            </div>
                        </div>
                        <!-- End of  Login Form -->
                        <p class="text-secondary text-center">
                            Copyright © <script>
                                document.write(new Date().getFullYear())
                            </script> Iniciar sesión - Santa Ana
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                            <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n10" style="background-image:url('{{ asset('assets/img/curved-images/curved6.jpg') }}')"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop
