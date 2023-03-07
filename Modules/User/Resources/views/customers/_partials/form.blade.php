@csrf
<div class="card-body">
  <div class="row">
    <div class="col-md-6">
      <div class="form-group">
        <label>(*) Nombre Completo</label>
        <input value="{{ $customer->name ?? old('name') }}" type="text" name="name" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>(*) Teléfono</label>
        <input value="{{ $customer->phone ?? old('phone') }}" type="text" name="phone" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>Dirección</label>
        <input value="{{ $customer->address ?? old('address') }}" type="text" name="address" class="form-control">
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group">
        <label>(*) Doc Identidad</label>
        <input value="{{ $customer->doc_id ?? old('doc_id') }}" type="text" name="doc_id" class="form-control">
      </div>
    </div>
  </div>
</div>

<div class="row">
    <div class="col-md-12">
      <div class="button-group d-flex justify-content-center" style="padding-bottom: 20px;">
        <a href="{{ url('/user/records/customers') }}" rel="noopener" class="btn btn-secondary"><i class="fa fa-chevron-left"></i> Atrás</a>
        <button style="margin-left: 5px;" type="submit" class="btn btn-success"><i class="far fa-credit-card"></i> Guardar</button>
      </div>
    </div>
</div>