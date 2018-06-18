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
    <link rel="stylesheet" href="{{url('administration/css/main2.css')}}">
    <!-- Fonts -->
    <link href="{{url('administration/css/font1.css')}}" rel='stylesheet' type='text/css'>
    <link href="{{url('administration/css/font2.css')}}" rel='stylesheet' type='text/css'>
     <!-- Feature detection -->
    <script src="{{url('administration/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/js/html5shiv.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
</head>

<body>

   
    <section id="login-container">

     <div class="loader" style="display:none"></div>

      <div class="row" style="margin-left: 25px;margin-right: 25px;">
        
            <div class="col-md-4" id="login-wrapper">

                @if (session('mensaje-registro'))
                    @include('mensajes.msj_correcto')
                @endif
                @if(!$errors->isEmpty())
                    <div class="alert alert-danger">
                        <p><strong>Error!! </strong>Corrija los siguientes errores</p>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title" style="text-align: center; font-weight: bold;" >     
                           BIENVENIDO AL SISTEMA
                        </h3>      
                    </div>

                    <div class="panel-body">
                       
                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                          {{ csrf_field() }}

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                          

                             <p class="col-md-12" style="font-weight: bold; color:black;">E-Mail <span style="font-weight:bold;color:#e65540;"> *</span></p>
                       
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Ingrese su email" required>
                                    <i class="fa fa-envelope"></i>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

               



                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                 <p class="col-md-12" style="font-weight: bold; color:black;">Password <span style="font-weight:bold;color:#e65540;"> *</span></p>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese contraseña" required>
                                    <i class="fa fa-lock"></i>
               
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>



                            <div class="form-group">
                               <div class="col-md-12">
                                    <button onclick="myFunction()" type="submit" class="btn btn-primary btn-block" style="font-weight: bold;">
                                                LOGIN
                                    </button>
                                </div>
                            </div>

                            


                        </form>
                    </div>
                </div>
            </div>

        

            
        </div>

    </section>
    <!--Global JS-->
    <script src="{{url('administration/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{url('administration/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{url('administration/plugins/waypoints/waypoints.min.js')}}"></script>
    <script src="{{url('administration/plugins/nanoScroller/jquery.nanoscroller.min.js')}}"></script>
     <script src="{{url('administration/js/application.js')}}"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46627904-1', 'authenticgoods.co');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">
            $(window).load(function() {
                    $(".loader").show();

                    $(".loader").fadeOut("slow");
            });

            function myFunction() {
                $(".loader").show();
           
            }
       
        </script>
</body>

</html>