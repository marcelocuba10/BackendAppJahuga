@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Usuarios</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user/dashboard">Inicio</a></li>
          <li class="breadcrumb-item active">Usuarios</li>
        </ol>
      </div>
    </div>
  </div>
</section>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row" style="padding-bottom: 15px;">
                <div class="col-sm-12 col-md-6">
                  @can('user-create')
                    <a class="btn btn-sm bg-success" href="/user/registers/users/create"><i class="fas fa-plus"></i> Nuevo</a>
                  @endcan
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" style="float: right;" class="dataTables_filter">
                    <form action="/user/registers/users/search">
                      <input style="background-color: #fff;" class="form-control form-control-sm" id="search" type="text" name="search" value="{{ $search ?? '' }}"
                        placeholder="Buscar usuario..">
                    </form>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <table id="example1" class="table table-bordered table-striped dataTable dtr-inline"
                    aria-describedby="example1_info">
                    <thead>
                      <tr>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">#</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Nombre</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Cod Referencia</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($users as $user)
                      <tr class="odd">
                        <td>#{{ ++$i }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->idReference }}</td>
                        <td>
                          @if ($user->idMaster == 1)
                          <p><span class="status-btn success-btn">Activado</span></p>
                          @else
                          <p><span class="status-btn active-btn">Desactivado</span></p>
                          @endif
                        </td>
                        <td><i class="lni lni-envelope mr-10"></i>{{ $user->email }}</td>
                        <td>
                          <div class="btn-group">
                            <a href="/user/registers/users/show/{{ $user->id }}">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            @can('user-edit')
                              @if ($currentUserId != $user->id)
                              <a href="/user/registers/users/edit/{{ $user->id }}">
                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                              </a>
                              @endif
                            @endcan
                            @can('user-delete')
                            @if ($currentUserId != $user->id)
                            <form method="POST" action="/user/registers/users/delete/{{ $user->id }}">
                              @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="text-danger">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                            </form>
                            @endif
                            @endcan
                          </div>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
              <div class="row">
                @if (isset($search))
                  {!! $users-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                @else
                  {!! $users-> links() !!}    
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection