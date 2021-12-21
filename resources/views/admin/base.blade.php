<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('assets/admin/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('assets/admin/img/favicon.ico') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Employees app</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    
    <link href="{{ url('assets/admin/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ url('assets/admin/css/light-bootstrap-dashboard.css?v=2.0.0') }} " rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ url('assets/admin/css/demo.css') }}" rel="stylesheet" />
    
     @yield('css')
</head>

<body>
    <div class="wrapper">
        <div class="sidebar">
 
            <div class="sidebar-wrapper">
                @include('admin.base.sidebar')
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                 @include('admin.base.nav')
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>
            <footer class="footer">
                @include('admin.base.footer')
            </footer>
        </div>
    </div>
  

</body>
<!--   Core JS Files   -->
<script src="{{ url('assets/admin/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ url('assets/admin/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ url('assets/admin/js/plugins/bootstrap-switch.js') }}"></script>
<!--  Google Maps Plugin    -->
<!--<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>  -->
<!--  Chartist Plugin  -->
<!--<script src="{{-- url('assets/admin/js/plugins/chartist.min.js') --}}"></script>  -->
<!--  Notifications Plugin    -->
<script src="{{ url('assets/admin/js/plugins/bootstrap-notify.js') }}"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="{{ url('assets/admin/js/light-bootstrap-dashboard.js?v=2.0.0') }} " type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src="{{ url('assets/admin/js/demo.js') }}"></script>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    
 @yield('js')
</script>

</html>
