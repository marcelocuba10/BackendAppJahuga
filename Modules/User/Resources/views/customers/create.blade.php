@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Registrar Nuevo Cliente</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/user/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user/registers/customers">Clientes</a></li>
            <li class="breadcrumb-item active">Nuevo Cliente</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <form method="POST" action="/user/registers/customers/create">
            @include('user::customers._partials.form')
        </form>
      </div>
    </div>
</section>

@endsection  
