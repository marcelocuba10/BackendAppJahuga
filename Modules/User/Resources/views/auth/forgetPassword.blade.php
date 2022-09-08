@extends('user::layouts.auth.auth-master')

@section('content')

<div class="login-box">
    <div class="login-logo">
      <a href="/"><b>App</b>Jahuga</a>
    </div>
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Ingrese su correo electrónico para recuperar su contraseña. Recibirás un correo electrónico con instrucciones.</p>
  
        <form method="post" action="/user/forget-password">
            @csrf
            @if (Session::has('message'))
                <div class="alert alert-success" role="alert">
                    {{ Session::get('message') }}
                </div>
            @endif

          <div class="input-group mb-3">
            <input name="email" id="email_address" type="text" value="{{ old('email') }}" class="form-control" placeholder="Email" required>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          @if ($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
          @endif

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-block">Solicitar nueva contraseña</button>
            </div>
          </div>
        </form>

        <p class="text-muted text-center" style="margin-bottom: -15px;margin-top: 15px;">¿Ya tienes una cuenta?</p>
        <p class="mt-3 mb-1 text-center">
          <a href="/user/login">Iniciar Sesión</a>
        </p>
      </div>
    </div>
</div>

@endsection