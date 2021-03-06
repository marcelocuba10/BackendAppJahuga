@csrf
<div class="form-group  row"><label class="col-sm-2 col-form-label">*Nombre</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" placeholder="Enter name" autocomplete="off" value="{{ $user->name ?? old('name') }}">
    </div>
</div>
<div class="form-group  row"><label class="col-sm-2 col-form-label">*Apellidos</label>
    <div class="col-sm-10">
        <input type="text" name="username" class="form-control" placeholder="Enter username" autocomplete="off" value="{{ $user->username ?? old('username') }}">
    </div>
</div>
<div class="form-group  row"><label class="col-sm-2 col-form-label">*Email</label>
    <div class="col-sm-10">
        <input type="text" readonly name="email" class="form-control" placeholder="Enter email" autocomplete="off" value="{{ $user->email ?? old('email') }}">
    </div>
</div>

<div class="form-group  row"><label class="col-sm-2 col-form-label">*Rol Asignado</label>
    <div class="col-sm-10">
        <select class="form-control m-b" name="roles">
            @foreach ($roles as $role)
                <option value="{{ $role }}" {{ ( $role === $userRole) ? 'selected' : '' }}> {{ $role}} </option>
            @endforeach 
        </select>
    </div>
</div>

<div class="form-group  row"><label class="col-sm-2 col-form-label">Contraseña</label>
    <div class="col-sm-10">
        <input type="password" name="password" class="form-control" placeholder="Enter password" autocomplete="off" value="">
        <span class="form-text m-b-none">Déjelo en blanco si no desea cambiar la contraseña</span>
    </div>
</div>
<div class="form-group  row"><label class="col-sm-2 col-form-label">Confirmar Contraseña</label>
    <div class="col-sm-10">
        <input type="password" name="confirm_password" class="form-control" placeholder="Confirm password" autocomplete="off" value="">
        <span class="form-text m-b-none">Déjelo en blanco si no desea cambiar la contraseña</span>
    </div>
</div>

<div class="hr-line-dashed"></div>
<div class="form-group row">
    <div class="col-sm-4 col-sm-offset-2">
        <a class="btn btn-white btn-sm" href="{{ route('users.index') }}" >Cancelar</a>
        <button class="btn btn-primary btn-sm" type="submit">Guardar Cambios</button>
    </div>
</div>