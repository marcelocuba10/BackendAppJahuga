@extends('user::layouts.auth.auth-master')

@section('content')

    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-5">
                        <a href="/"><img src="/img/login.jpg" alt="login" class="login-card-img"></a>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <div class="brand-wrapper">
                                <img src="/img/logo.svg" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Inicie sesión en jahuga.com</p>
                            <form method="post" action="/user/login">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                @include('user::includes.alerts')

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="Email address" required>
                                    @if ($errors->has('email'))
                                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>

                                <div class="form-group mb-4">
                                    <label for="password" class="sr-only">Password</label>
                                    <input name="password" value="{{ old('password') }}" type="password"
                                        class="form-control" placeholder="***********">
                                    @if ($errors->has('password'))
                                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <input type="submit" class="btn btn-block login-btn mb-4" type="button" value="Login">
                            </form>
                            <a href="#!" class="forgot-password-link">Olvidó su contraseña?</a>
                            <p class="login-card-footer-text">No tiene una cuenta aún? <a href="/user/register" class="text-reset">Regístrese aquí</a></p>
                            <nav class="login-card-footer-nav">
                                <p>Facilidades increíbles para tu empresa! :)</p>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    @endsection