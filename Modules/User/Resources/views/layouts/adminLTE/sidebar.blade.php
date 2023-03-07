
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="{{ url('/user/dashboard') }}" class="nav-link {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
          <i class="nav-icon far fa-image"></i>
          <p>Dashboard</p>
        </a>
      </li>
      <li class="nav-item {{ (request()->is('user/records/*')) ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>Registros<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview" style="display:{{ (request()->is('user/records/*')) ? 'block' : 'hide' }}">
          @can('customer-list')
          <li class="nav-item">
            <a href="{{ url('/user/records/customers') }}" class="nav-link {{ (request()->is('user/records/customers')) || (request()->is('user/records/customers/create')) || (request()->is('user/registers/customers/edit')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Clientes</p>
            </a>
          </li>
          @endcan
          @can('user-list')
          <li class="nav-item">
            <a href="{{ url('/user/records/users') }}" class="nav-link {{ (request()->is('user/records/users')) || (request()->is('user/records/users/create')) || (request()->is('user/registers/users/edit')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Funcionarios</p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Productos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/records/grounds') }}" class="nav-link {{ (request()->is('user/records/grounds')) || (request()->is('user/records/grounds/create')) || (request()->is('user/registers/grounds/edit')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Canchas</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-calendar"></i>
          <p>Reservas</p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-university"></i>
          <p>Financiero<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cuentas a Pagar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cuentas a Recibir</p>
            </a>
          </li>
        </ul>
      </li>
      @can('report-list')
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-file"></i>
          <p>Informes<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('/user/reports/customers') }}" class="nav-link {{ (request()->is('user/reports/customers')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/reports/machines') }}" class="nav-link {{ (request()->is('user/reports/machines')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Maquinas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/reports/users') }}" class="nav-link {{ (request()->is('user/reports/users')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Funcionarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/user/reports/schedules') }}" class="nav-link {{ (request()->is('user/reports/schedules')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Horarios</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      <li class="nav-item {{ (request()->is('user/ACL/*')) || (request()->is('/user/profile')) ? 'menu-is-opening menu-open' : '' }}">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-cog"></i>
          <p>Ajustes<i class="fas fa-angle-left right"></i></p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ url('/user/profile/'.Auth::user()->id) }}" class="nav-link {{ (request()->is('/user/profile')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Mi Perfil</p>
            </a>
          </li>
          @can('role-list')
          <li class="nav-item">
            <a href="{{ url('/user/ACL/roles') }}" class="nav-link {{ (request()->is('user/ACL/roles')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Roles</p>
            </a>
          </li>
          @endcan     
        </ul>
      </li>
    </ul>
  </nav>

  <script type="text/javascript">
    function toggle(ddmenu_1, ddlink_1) {
      var n = document.getElementById(ddmenu_1);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_1).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_1).setAttribute('aria-expanded', 'true');
      }
    }
    function toggle(ddmenu_3, ddlink_3) {
      var n = document.getElementById(ddmenu_3);
      if (n.style.display != 'none'){
        n.style.display = 'none';
        document.getElementById(ddlink_3).setAttribute('aria-expanded', 'false');
      }else{
        n.style.display = '';
        document.getElementById(ddlink_3).setAttribute('aria-expanded', 'true');
      }
    }
  </script>
