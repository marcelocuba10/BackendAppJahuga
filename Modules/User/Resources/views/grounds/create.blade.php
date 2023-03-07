@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Registrar Nueva Cancha</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ url('/user/records/grounds') }}">Canchas</a></li>
                <li class="breadcrumb-item active"><a href="{{ url('/user/records/grounds/create') }}"><b>Nueva Cancha</b></a></li>
            </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <form method="POST" action="{{ url('/user/records/grounds/store') }}">
            @include('user::grounds._partials.form')
        </form>
      </div>
    </div>
</section>

@endsection