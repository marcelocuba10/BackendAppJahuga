@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Canchas</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ url('/user/dashboard') }}">Inicio</a></li>
          <li class="breadcrumb-item active">Canchas</li>
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
                  @can('ground-create')
                    <a class="btn btn-sm bg-success" href="{{ url('/user/records/grounds/create') }}"><i class="fas fa-plus"></i> Nuevo</a>
                  @endcan
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" style="float: right;" class="dataTables_filter">
                    <form action="{{ url('/user/records/users/search') }}">
                      <input style="background-color: #fff;" class="form-control form-control-sm" id="search" type="text" name="search" value="{{ $search ?? '' }}"
                        placeholder="Buscar cancha..">
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
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Descripcion</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Precio</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($grounds as $ground)
                      <tr class="odd">
                        <td>#{{ ++$i }}</td>
                        <td>{{ $ground->name }}</td>
                        <td>{{ $ground->description }}</td>
                        <td>{{ $ground->status }}</td>
                        <td>{{ number_format((double)$ground->price, 3, '.', ''); }} GS</td>
                        <td>
                          <div class="btn-group">
                            <a href="{{ url('/user/records/grounds/show/'.$ground->id) }}">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            @can('ground-edit')
                              @if ($currentUserId != $ground->id)
                              <a href="{{ url('/user/records/grounds/edit/'.$ground->id) }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                              @endif
                            @endcan
                            @can('ground-delete')
                              @if ($currentUserId != $ground->id)
                              <form method="POST" action="{{ url('/user/records/grounds/delete/'.$ground->id) }}">
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
                @if (isset($search))
                  {!! $grounds-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                @else
                  {!! $grounds-> links() !!}    
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
