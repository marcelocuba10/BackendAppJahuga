@extends('user::layouts.auth.auth-master')

@section('content')

<div class="login-box">
    <div class="login-logo">
      <a href="/"><b>App</b>Jahuga</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Ingresa tus datos para iniciar sesión</p>
  
        <form method="post" action="/user/login">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-warning" role="alert">
                    {{ Session::get('error') }}
                </div>
            @endif

          <div class="input-group mb-3">
            <input name="email" value="{{ old('email') }}" type="text" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @if ($errors->has('email'))
                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
            @endif
          </div>

          <div class="input-group mb-3">
            <input name="password" value="{{ old('password') }}" type="password" class="form-control" placeholder="Password" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif
          </div>

          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" name="remember" value="1">
                <label for="remember">Recordarme</label>
              </div>
            </div>
            <div class="col-4">
            </div>
          </div>
          <div class="social-auth-links text-center mb-3">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
        </form>
        <p class="mb-1">
          <a href="/user/forget-password">¿Has olvidado tu contraseña?</a>
        </p>
      </div>
    </div>
  </div>

@endsection