@extends('user::layouts.auth.auth-master')

@section('content')

    <div class="container">
        <div class="left"></div>
        <div class="right">
            <a href="/admin/login/"><button class="ththhf" type="button" class="btn btn-block create-account">Admin Login</button></a>
            <a href="/"><button class="ththhf" type="button" class="btn btn-block create-account">Site ConectaCode</button></a>
            <div class="login-texto">
                <p class="login-title">Bienvenido a ConectaCode</p>
                <p class="login-message">Facilidades increíbles para tu empresa! :)</p>
            </div>
        </div>    
    </div>

    <div class="registration-form">
        
        <form method="post" action="/user/login">
            
            <div class="form-icon">
                <img class="img-logo" src="/img/apiscrowd.png">
            </div>
            <p class="login-message2">Sign in to ApisCrowd</p>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            @include('user::includes.alerts')

            <div class="form-group">
                <input name="username" value="{{ old('username') }}" type="text" class="form-control item" placeholder="Email or Username" required>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>

            <div class="form-group">
                <input name="password" value="{{ old('password') }}" type="password" class="form-control item" placeholder="Password" required>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-block create-account">Login</button>
            </div>
            
            <a href="/user/recovery-options"><small>Need some help?</small></a>
            <p class="text-muted text-center" style="margin-bottom: 0px;margin-top: 15px;"><small>Don't have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" style="text-decoration: underline;" href="/user/register">Create an account</a>
        </form>
    </div>
    
@endsection