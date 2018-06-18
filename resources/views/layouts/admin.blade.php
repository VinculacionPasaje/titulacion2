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
    <title>Asistencia UTMACH</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('administration/img/favicon.png')}}">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{url('administration/plugins/bootstrap/css/bootstrap.min.css')}}">

    <!-- Fonts from Font Awsome -->

    <link rel="stylesheet" href="{{url('administration/css/font-awesome.min.css')}}">
    <!-- CSS Animate -->
   <link rel="stylesheet" href="{{url('administration/css/animate.css')}}">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="{{url('administration/css/main.css')}}">
    <link rel="stylesheet" href="{{url('administration/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{url('administration/dist/css/sweetalert.css')}}">
    <link rel="stylesheet" href="{{url('administration/dist/css/alertify.css')}}">
    <link rel="stylesheet" href="{{url('frontend/css/mensajes.css')}}">


    <!-- ToDos  -->
    <link rel="stylesheet" href="{{url('administration/plugins/todo/css/todos.css')}}">
     <link rel="stylesheet" href="{{url('administration/plugins/todo/css/todos.css')}}">
         <link rel="stylesheet" href="{{url('administration/plugins/datepicker/datepicker3.css')}}">
             <link rel="stylesheet" href="{{url('administration/plugins/select2/select2.min.css')}}">

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

<div class="loader"></div>
    <section id="container">
        <header id="header">
            <!--logo start-->
            <div class="brand">
                <a href="{{url ('administracion')}}" onclick="return myFunction();" class="logo"><span>Administración</span></a>
            </div>
            <!--logo end-->
            <div class="toggle-navigation toggle-left">
                <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Menú">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="user-nav">
                <ul>

                   
                    <li class="dropdown settings">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                       Bienvenido  {!! Auth::user()->abreviatura.' '. Auth::user()->name.' '.Auth::user()->last_name !!} <i class="fa fa-angle-down"></i>
                    </a>
                        <ul class="dropdown-menu animated fadeInDown">
                           
                            <li>

                              <a href="{{ route('logout') }}"
                                           onclick="
                                                   myFunction();
                                                    event.preventDefault();
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
                        <a href="{{url ('administracion')}}" onclick="return myFunction();"><i class="fa fa-dashboard"></i><span>INICIO</span></a>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-users"></i><span>ROLES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('roles.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('roles.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-user"></i><span>USUARIOS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('usuarios.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('usuarios.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                     <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-bookmark"></i><span>SEMESTRES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('semestres.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('semestres.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-briefcase"></i><span>LABORATORIOS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('salones.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('salones.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-book"></i><span>ASIGNATURAS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('asignaturas.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('asignaturas.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-clock-o"></i><span>AÑOS LECTIVO</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('anios.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('anios.create')}}"onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-calendar"></i><span>CALENDARIO CLASES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('calendarios.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('calendarios.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-book"></i><span>AGREGAR ASIGNATURAS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('asignaturas_calendarios.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                              <li><a href="{{route('asignaturas_calendarios.create')}}" onclick="return myFunction();"><i class="fa fa-file"></i> Agregar</a></li>
                        </ul>
                    </li>

                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-book"></i><span>ASISTENCIAS</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('asistencias.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Listado</a></li>
                       
                            
                        </ul>
                    </li>

                     <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-book"></i><span>REPORTES</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                             <li><a href="{{route('reportes.index')}}" onclick="return myFunction();"><i class="fa fa-list-ul"></i>Generar Reporte</a></li>
                       
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
      <script src="{{url('administration/plugins/datepicker/bootstrap-datepicker.js')}}"></script>

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
            "autoWidth": false,
            "bInfo" : false
            });
        });
        </script>

        <script>
        $(function () {

           $('.timepicker').timepicker({
                timeFormat: 'HH:mm:ss',
                interval: 60,
                minTime: '07:00',
                maxTime: '13:00',
              
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

      <script type="text/javascript">
        $(window).load(function() {
            $(".loader").fadeOut("slow");


        });

         function myFunction() {
                $(".loader").show();
           
            }
        </script>

 

       @yield('script')


</body>

</html>
