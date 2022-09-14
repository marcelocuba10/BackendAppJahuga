@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Registrar Nuevo Rol</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/user/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/user/ACL/roles">Roles</a></li>
            <li class="breadcrumb-item active">Crear Nuevo Rol</li>
          </ol>
        </div>
      </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
      <div class="card card-default">
        <form method="POST" action="/user/ACL/roles/create">
            @include('user::roles._partials.form')
        </form>
      </div>
    </div>
</section>

@endsection   
