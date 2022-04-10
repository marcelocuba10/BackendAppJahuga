@extends('user::tema.app')
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>My Account</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('user.dashboard') }}">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('users_.show.profile',$user->id) }}">Profile</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="{{ route('users_.edit.profile',$user->id) }}">Edit</a>
            </li>
        </ol>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight ecommerce">

    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-content">
                    <form method="POST" action="{{ route('users_.update.profile', $user->id) }}">
                        @csrf
                        @method('PUT') <!-- menciono el metodo PUT, ya que en mi route utilzo Route::put(); -->
                        @include('user::users._partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

@endsection