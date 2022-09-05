  <!-- Sidebar Menu -->
  <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <li class="nav-item">
        <a href="/user/dashboard" class="nav-link {{ (request()->is('user/dashboard')) ? 'active' : '' }}">
          <i class="nav-icon far fa-image"></i>
          <p>
            Dashboard
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-edit"></i>
          <p>
            Registros
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          @can('user-list')
          <li class="nav-item">
            <a href="/user/users" class="nav-link {{ (request()->is('user/users')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Clientes</p>
            </a>
          </li>
          @endcan
          <li class="nav-item">
            <a href="pages/forms/advanced.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Productos</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/forms/editors.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Canchas</p>
            </a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a href="pages/gallery.html" class="nav-link">
          <i class="nav-icon fa fa-calendar"></i>
          <p>
            Reservas
          </p>
        </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-university"></i>
          <p>
            Financiero
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="pages/tables/simple.html" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Cuentas a Pagar</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/tables/data.html" class="nav-link">
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
          <p>
            Informes
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="/user/reports/customers" class="nav-link {{ (request()->is('user/reports/customers')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Clientes</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/reports/machines" class="nav-link {{ (request()->is('user/reports/machines')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Maquinas</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/reports/users" class="nav-link {{ (request()->is('user/reports/users')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Funcionarios</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="/user/reports/schedules" class="nav-link {{ (request()->is('user/reports/schedules')) ? 'active' : '' }}">
              <i class="far fa-circle nav-icon"></i>
              <p>Horarios</p>
            </a>
          </li>
        </ul>
      </li>
      @endcan

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i class="nav-icon fa fa-cog"></i>
          <p>
            Ajustes
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{ route('users_.show.profile', Auth::user()->id) }}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Mi Perfil</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>ACL
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview" style="display: none;">
              @can('role-list')
              <li class="nav-item">
                <a href="/user/ACL/roles" class="nav-link {{ (request()->is('user/ACL/roles')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
                </a>
              </li>
              @endcan
              @can('permission-list')
              <li class="nav-item">
                <a href="/user/ACL/permissions" class="nav-link {{ (request()->is('user/ACL/permissions')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>
        </ul>
      </li>
    </ul>
  </nav>
  <!-- /.sidebar-menu -->