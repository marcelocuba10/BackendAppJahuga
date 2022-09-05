

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/user/logout/" class="nav-link">@if(Auth::check()) {{Auth::user()->name}} @endif</a>
    </li>
    <li class="nav-item d-none d-sm-inline-block">
      <a href="/user/logout/" class="nav-link">Cerrar Sesión</a>
    </li>
  </ul>
</nav>