<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon" />
  <title>Jahuga | {{ config('app.name')}}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="/tema2/plugins/fontawesome-free/css/all.min.css">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/tema2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/tema2/dist/css/custom-style.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  @include('user::layouts.adminLTE.navbar')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="/tema2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Jahuga</span>
    </a>

    <!-- Sidebar -->
    @include('user::layouts.adminLTE.sidebar')
    {{-- @include('user::layouts.includes.alerts') --}}
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('content')
  </div>
  <!-- /.content-wrapper -->

  <!-- Footer -->
  @include('user::layouts.adminLTE.footer')
  <!-- /.Footer -->
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

  <!-- ========= Maskmoney files linkup ======== -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
  
  <!-- ========= Scripts ======== -->
  <script>

    /** ========= Alert hide ======== **/
    $(document).ready(function() {
        setTimeout(function() {
            $(".alert-success").alert('close');
        }, 2500);
    
        setTimeout(function() {
            $(".alert-danger").alert('close');
        }, 2500);
    });

    /** ========= InputMask ======== **/
    document.addEventListener("DOMContentLoaded", readyInputMask);
    function readyInputMask() {
      VMasker(document.getElementById("phone")).maskPattern('(999) 999 999');
      VMasker(document.getElementById("date")).maskPattern('99/99/9999');
    }

    /** ========= Tooltip ======== **/
    $(document).ready(function() {
      $('[data-toggle="tooltip"]').tooltip();
    });

    /** ========= Calendar ======== **/
    document.addEventListener("DOMContentLoaded", function () {
      var calendarMiniEl = document.getElementById("calendar-mini");
      var calendarMini = new FullCalendar.Calendar(calendarMiniEl, {
        initialView: "dayGridMonth",
        headerToolbar: {
          end: "today prev,next",
        },
      });
      calendarMini.render();
    });

  </script>

<!-- jQuery -->
<script src="/tema2/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="/tema2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="/tema2/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="/tema2/plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/tema2/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/tema2/dist/js/pages/dashboard3.js"></script>
</body>
</html>
