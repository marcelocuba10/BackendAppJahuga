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
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">DataTables</li>
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
                    <a class="btn btn-sm bg-success" href="{{ route('users.create') }}"><i class="fas fa-plus"></i> Nuevo</a>
                  @endcan
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" style="float: right;" class="dataTables_filter">
                    <form action="/user/users/search">
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
                            <a href="{{ route('users.show', $user->id) }}">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            @can('user-edit')
                              @if ($currentUserId != $user->id)
                              <a href="{{ route('users.edit', $user->id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                              @endif
                            @endcan
                            @can('user-delete')
                            @if ($currentUserId != $user->id)
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}">
                              @csrf
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="submit" class="text-danger">
                                  <i class="lni lni-trash-can"></i>
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
                <div class="col-sm-12 col-md-5">
                  <div class="dataTables_info" id="example1_info" role="status" aria-live="polite">Showing 1 to 10 of 57
                    entries</div>
                </div>
                <div class="col-sm-12 col-md-7">
                  <div style="float: right;" class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                    <ul class="pagination">
                      <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                          aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li>
                      <li class="paginate_button page-item active"><a href="#" aria-controls="example1" data-dt-idx="1"
                          tabindex="0" class="page-link">1</a></li>
                      <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="2"
                          tabindex="0" class="page-link">2</a></li>
                      <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="3"
                          tabindex="0" class="page-link">3</a></li>
                      <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="4"
                          tabindex="0" class="page-link">4</a></li>
                      <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="5"
                          tabindex="0" class="page-link">5</a></li>
                      <li class="paginate_button page-item "><a href="#" aria-controls="example1" data-dt-idx="6"
                          tabindex="0" class="page-link">6</a></li>
                      <li class="paginate_button page-item next" id="example1_next"><a href="#" aria-controls="example1"
                          data-dt-idx="7" tabindex="0" class="page-link">Next</a></li>
                    </ul>
                  </div>
                </div>
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