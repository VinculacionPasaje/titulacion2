<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home Usuario</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('frontend/images/ico/ico.ico')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{url('administration/plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Fonts from Font Awsome -->

    <link rel="stylesheet" href="{{url('administration/css/font-awesome.min.css')}}">
    <!-- CSS Animate -->
   <link rel="stylesheet" href="{{url('administration/css/animate.css')}}">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="{{url('administration/css/main.css')}}">

    <link rel="stylesheet" href="{{url('administration/dist/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/alertify.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/mensajes.css')}}">


    <!-- ToDos  -->
    <link rel="stylesheet" href="{{url('administration/plugins/todo/css/todos.css')}}">
     <link rel="stylesheet" href="{{url('administration/plugins/todo/css/todos.css')}}">

    <!-- Morris  -->

    <link rel="stylesheet" href="{{url('administration/plugins/time/jquery.timepicker.min.css')}}">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Feature detection -->
    <script src="{{url('administration/js/modernizr-2.6.2.min.js')}}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <section id="container">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="{{url ('administracion')}}" class="logo"><span>Cinema </span>TV</a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="user-nav">
                <ul>

                    <li class="profile-photo">
                        <img src="assets/img/avatar.png" alt="" class="img-circle">
                    </li>
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       {!! Auth::user()->name.' '.Auth::user()->last_name !!} <i class="fa fa-angle-down"></i>
                    </a>
                        <ul class="dropdown-menu animated fadeInDown">
                            <li>
                                <a href="#"><i class="fa fa-user"></i> Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge badge-danager" id="user-inbox">5</span></a>
                            </li>
                            <li>

                              <a href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                                                    class="btn btn-default btn-flat"><i class="fa fa-power-off"></i>
                                           Salir
                                       </a>


                      
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                           {{ csrf_field() }}
                                       </form>
                            </li>
                        </ul>
                    </li>


                </ul>
            </div>
        </header>
        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">
                <ul class="nano-content">
                    <li class="active">
                        <a href="{{url ('administracion')}}"><i class="fa fa-dashboard"></i><span>INICIO</span></a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>ROLES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('roles.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('roles.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>USUARIOS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('usuarios.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('usuarios.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                     <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>SEMESTRES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('semestres.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('semestres.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>SALON CLASES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('salones.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('salones.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>ASIGNATURAS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('asignaturas.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('asignaturas.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>AÑOS LECTIVO</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('anios.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('anios.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>CALENDARIO CLASES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('calendarios.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('calendarios.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                       <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>AGREGAR ASIGNATURAS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('asignaturas_calendarios.index')}}"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('asignaturas_calendarios.create')}}"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                     
                    

                </ul>
            </div>

        </aside>
        <!--sidebar left end-->
        <!--main content start-->
        <section class="main-content-wrapper">
              @yield('title')
            <section id="main-content">
              @yield('contenido')

            </section>
        </section>
        <!--main content end-->

    </section>
    <!--Global JS-->

    <script src="{{url('administration/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{url('administration/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('administration/plugins/waypoints/waypoints.min.js')}}"></script>
    <script src="{{url('administration/js/application.js')}}"></script>

        <script src="{{url('administration/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{url('administration/plugins/time/jquery.timepicker.min.js')}}"></script>

    <script src="{{url('administration/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{url('administration/dist/js/sweetalert.min.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.date.extensions.js')}}"></script>
    <script src="{{url('administration/dist/js/jquery.inputmask.extensions.js')}}"></script>

    <script src="{{url('administration/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{url('administration/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
     <script>
        $(function () {
            $("#example1").DataTable();
            $('#example2').DataTable({
            "paging": false,
            "lengthChange": false,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false
            });
        });
        </script>

        <script>
        $(function () {

           $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '07:00',
                maxTime: '13:00',
                defaultTime: '07:00',
                startTime: '07:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                show2400: true
            });
        });
        </script>


    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(3000);
            },3000);
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".alert-danger").fadeOut(3000);
            },3000);
        });
    </script>

 

       @yield('script')


</body>

</html>
