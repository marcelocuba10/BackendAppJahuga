@extends('user::layouts.adminLTE.app')
@section('content')

<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Clientes</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="/user/dashboard">Inicio</a></li>
          <li class="breadcrumb-item active">Clientes</li>
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
                  @can('customer-create')
                    <a class="btn btn-sm bg-success" href="/user/registers/customers/create"><i class="fas fa-plus"></i> Nuevo</a>
                  @endcan
                </div>
                <div class="col-sm-12 col-md-6">
                  <div id="example1_filter" style="float: right;" class="dataTables_filter">
                    <form action="/user/registers/customers/search">
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
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Cod Referencia</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Status</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Email</th>
                        <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($customers as $customer)
                      <tr class="odd">
                        <td>#{{ ++$i }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->idReference }}</td>
                        <td>
                          @if ($customer->idMaster == 1)
                          <p><span class="status-btn success-btn">Activado</span></p>
                          @else
                          <p><span class="status-btn active-btn">Desactivado</span></p>
                          @endif
                        </td>
                        <td><i class="lni lni-envelope mr-10"></i>{{ $customer->email }}</td>
                        <td>
                          <div class="btn-group">
                            <a href="/user/registers/customers/{{ $customer->id }}/show">
                              <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                            @can('customer-edit')
                              @if ($currentUserId != $customer->id)
                              <a href="/user/registers/customers/edit/{{ $customer->id }}">
                                <i class="fa fa-pencil" aria-hidden="true"></i>
                              </a>
                              @endif
                            @endcan
                            @can('customer-delete')
                            @if ($currentUserId != $customer->id)
                            <form method="POST" action="/user/registers/customers/{{ $customer->id }}/delete">
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
                  {!! $customers-> appends($search)->links() !!} <!-- appends envia variable en la paginacion-->
                @else
                  {!! $customers-> links() !!}    
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