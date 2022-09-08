<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="/assets/images/favicon.png" type="image/x-icon" />
  <title>App Jahuga | {{ config('app.name')}}</title>

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="/tema2/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/tema2/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="/tema2/dist/css/custom-style.css">
</head>

<body class="hold-transition sidebar-mini">
<div class="wrapper">

  @include('user::layouts.adminLTE.navbar')

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
      <img src="/tema2/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">App Jahuga</span>
    </a>

    @include('user::layouts.adminLTE.sidebar')
    {{-- @include('user::layouts.includes.alerts') --}}
  </aside>

  <div class="content-wrapper">
    @yield('content')
  </div>

  @include('user::layouts.adminLTE.footer')
</div>

  <!-- ========= Maskmoney files linkup ======== -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" type="text/javascript"></script>
  
  <script src="/tema2/plugins/jquery/jquery.min.js"></script>
  <script src="/tema2/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="/tema2/dist/js/adminlte.js"></script>
  <script src="/tema2/plugins/chart.js/Chart.min.js"></script>
  <script src="/tema2/dist/js/demo.js"></script>
  <script src="/tema2/dist/js/pages/dashboard3.js"></script>
  
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
</body>
</html>
