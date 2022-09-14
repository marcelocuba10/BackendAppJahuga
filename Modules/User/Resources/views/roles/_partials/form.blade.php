@csrf
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>(*) Nombre</label>
        <input type="text" class="form-control" name="name" value="{{ $role->name ?? old('name') }}" class="bg-transparent" placeholder="Ingrese Nombre">
      </div>
    </div>
    @if ($guard_name)
    <div class="col-md-6">
      <div class="form-group">
        <label>Guard</label>
        <input class="form-control" type="text" value="{{ $guard_name ?? old('guard_name')}}" readonly>
      </div>
    </div>
    @else
    <div class="col-md-6">
      <div class="form-group">
          <label>Guard</label>
          <input type="text" value="{{ $role->guard_name ?? old('guard_name')}}" readonly>
      </div>
    </div> 
    @endif
    <div class="col-12">
      <div class="input-style-1">
          <label>(*) Permisos</label>
      </div>
      @foreach ($permissions as $permission )
        <div class="form-group clearfix">
          <div class="icheck-success d-inline">
            <input class="form-check-input input-checkbox" id="checkboxSuccess{{ $permission->id }}" name="permission[]" type="checkbox" value="{{ $permission->id }}" @if(!empty($rolePermission)) {{ in_array($permission->name, $rolePermission)  ? 'checked' : '' }} @endif>
            <label class="form-check-label" for="checkboxSuccess{{ $permission->id }}">{{ $permission->name }}</label>
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="button-group d-flex justify-content-center" style="padding-bottom: 20px;">
        <a href="/user/ACL/roles" rel="noopener" class="btn btn-secondary"><i class="fa fa-chevron-left"></i> Atrás</a>
        <button style="margin-left: 5px;" type="submit" class="btn btn-success"><i class="far fa-credit-card"></i> Guardar</button>
      </div>
    </div>
</div>
