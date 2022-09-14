@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Roles</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user/dashboard">Inicio</a></li>
          <li class="breadcrumb-item active">Roles</li>
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
                  @can('role-create')
                    <a class="btn btn-sm bg-success" href="/user/ACL/roles/create"><i class="fas fa-plus"></i> Nuevo</a>
                  @endcan
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" style="float: right;" class="dataTables_filter">
                    <form action="/user/ACL/roles/search">
                      <input style="background-color: #fff;" class="form-control form-control-sm" id="search" type="text" name="search" value="{{ $search ?? '' }}"
                        placeholder="Buscar cliente..">
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
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Guard_name</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($roles as $role)
                      <tr class="odd">
                        <td>#{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->guard_name }}</td>
                        <td>
                          <div class="btn-group">
                            <a href="/user/ACL/roles/show/{{ $role->id }}">
                              <button type="button" class="btn btn-default">
                                <i class="fa fa-eye icon-info"></i>
                              </button>
                            </a>
                            @can('role-edit')
                            <a href="/user/ACL/roles/edit/{{ $role->id }}">
                              @if (!$role->system_role)
                                <button type="button" class="btn btn-default">
                                  <i class="fa fa-paint-brush icon-success"></i>
                                </button>
                              @endif  
                            </a>
                            @endcan
                            @can('role-delete')
                            <form method="POST" action="/user/ACL/roles/delete/{{ $role->id }}">
                              @csrf
                              <input name="_method" type="hidden" value="DELETE">
                              @if (!$role->system_role)
                                <button type="submit" class="btn btn-default">
                                  <i class="fa fa-trash icon-danger"></i>
                                </button>
                              @endif  
                            </form>
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
                  {!! $roles-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                @else
                  {!! $roles-> links() !!}    
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