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
    <title>Reporte Asistencia</title>
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

<body style="background: white;">

<!--
      <div style="text-align: center;" class="col-xs-12">
      <img style="padding-right: 15px" src="{{url('fotos/'.'ut-min.png')}}" class="user-image" alt="User Image">
       <img style="padding-right: 15px" src="{{url('fotos/'.'sis-min.png')}}" class="user-image" alt="User Image">
       </div>

       -->

      <p style="text-align: center; font-size: 15px; color: black;">UNIVERSIDAD TÉCNICA DE MACHALA</p>
      <p style="text-align: center;  font-size: 15px; color: black;">UNIDAD ACADÉMICA DE INGENIERÍA CIVIL</p>
      <p style="text-align: center;  font-size: 15px; color: black;">CARRERA DE INGENIERÍA DE SISTEMAS & TECNOLOGÍAS DE LA INFORMACIÓN</p>


    <div class="row">
        <div class="col-xs-12">
           
                              
               
                @if(count($asistencias) >0)  <!-- este if es para ver si hay datos registrados en la BD -->
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <td colspan="8" style="text-align: center; font-size: 15px; color: black;">{{$calendario->titulo}}</td>
                                </tr>
                                <tr>
                                    <th style="color: black;">Horario</th>
                               
                                    <th style="color: black;">Día</th>
                                     <th style="color: black;">Asignatura</th>
                                     <th style="color: black;">Docente</th>
                                     <th style="color: black;">Semestre</th>
                                    
                                    <th style="color: black;">Fecha</th>
                                    <th style="color: black;">Hora Asistencia</th>
                                    <th style="color: black;">Firma</th>
                                   
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asistencias as $asistencia)
                                 @if($asistencia->asignatura_calendario->calendario->id ==$id_calendario)
                                    <tr data-id="{{$asistencia->id}}">
                                        <td style="color: black;">{{$asistencia->asignatura_calendario->hora_inicio}} - {{$asistencia->asignatura_calendario->hora_fin}}</td>
                                       
                                         <td style="color: black;">{{$asistencia->asignatura_calendario->dia_semana}}</td>
                                         <td style="color: black;">{{$asistencia->asignatura_calendario->asignatura_semestre->asignatura->asignatura}}</td>
                                          <td style="color: black;">{{$asistencia->asignatura_calendario->asignatura_semestre->asignatura->usuario->abreviatura .' '. $asistencia->asignatura_calendario->asignatura_semestre->asignatura->usuario->name  .' '. $asistencia->asignatura_calendario->asignatura_semestre->asignatura->usuario->last_name}}</td>
 
                                        <td style="color: black;">{{$asistencia->asignatura_calendario->asignatura_semestre->semestre->semestre .' '.$asistencia->asignatura_calendario->asignatura_semestre->semestre->paralelo }}</td>
                                       
                                        <td style="color: black;">{{$asistencia->fecha}}</td>
                                        <td style="color: black;">{{$asistencia->hora}}</td>
                                         <td style="color: black;">{{$asistencia->firma}}</td>
                                          
                                         
                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                          
                        </div>
                    </div>
        
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna asistencia...</label>  </div>
                @endif
                
           
        </div>
    </div>
    <!--Global JS-->
    <script src="{{url('administration/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{url('administration/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    
</body>

</html>


   
    

  
    
