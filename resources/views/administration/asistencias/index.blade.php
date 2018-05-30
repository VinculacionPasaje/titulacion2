@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Listado de Asistencias
    
        </h1>
       
    </section>
@endsection

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
     @if (session('mensaje-error'))
        @include('mensajes.msj_rechazado')
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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              
                <!-- /.box-header -->

                <div class="row" style="padding-top: 10px;">

                    {!! Form::open(['route' => 'asistencias.store','method'=>'POST']) !!}
                    <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">


                    <div class="col-md-4 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Eliga la Fecha') !!}
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" class="form-control pull-right" id="datepicker" name = "fecha" value="{{old('fecha')}}">
                            </div>
                        </div>
                    </div>

                     <div class="col-md-4 col-xs-12">
                                     <div class="form-group">
                                        <label>Calendario</label>
                                        <select class="form-control" name="calendario_id" id="calendario_id" style="width: 100%;" >
                                            <option value="" disabled selected>Seleccione un Calendario</option>
                                            @foreach($calendarios as $calendario)
                                                <option value="{{$calendario->id}}" >  {{ $calendario->titulo }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                               <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                {!! Form::submit('Verificar Asistencias',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    
                                    </div>

                         {!! Form::close() !!}



                </div>

                
               
                @if(count($asistencias) >0)  <!-- este if es para ver si hay datos registrados en la BD -->
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>Horario</th>
                               
                                    <th>Día</th>
                                     <th>Asignatura</th>
                                     <th>Docente</th>
                                     <th>Semestre</th>
                                    
                                    <th>Fecha</th>
                                    <th>Hora Asistencia</th>
                                    <th>Firma</th>
                                    <th>Justificación</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asistencias as $asistencia)
                                 @if($asistencia->state !=0)
                                    <tr data-id="{{$asistencia->id}}">
                                        <td>{{$asistencia->asignatura_calendario->hora_inicio}} - {{$asistencia->asignatura_calendario->hora_fin}}</td>
                                       
                                         <td>{{$asistencia->asignatura_calendario->dia_semana}}</td>
                                         <td>{{$asistencia->asignatura_calendario->asignatura->asignatura}}</td>
                                          <td>{{$asistencia->asignatura_calendario->asignatura->usuario->abreviatura .' '. $asistencia->asignatura_calendario->asignatura->usuario->name  .' '. $asistencia->asignatura_calendario->asignatura->usuario->last_name}}</td>
 
                                        <td>{{$asistencia->asignatura_calendario->asignatura->semestre->semestre .' '.$asistencia->asignatura_calendario->asignatura->semestre->paralelo }}</td>
                                       
                                        <td>{{$asistencia->fecha}}</td>
                                        <td>{{$asistencia->hora}}</td>
                                         <td>{{$asistencia->firma}}</td>
                                          
                                         @if($asistencia->justificacion ==0) <!--no justifico falta -->
                                               <td>No</td>

                                              @else

                                              @if($asistencia->justificacion ==1)   <!--si justifico falta -->

                                              <td>Si</td>

                                              


                                              @else

                                                @if($asistencia->justificacion ==2)   <!--si asitio a la hora -->

                                                  <td>------</td>


                                                @endif
                                            @endif
                                            @endif
                                        <td>
                                            {!!link_to_route('asistencias.edit', $title = 'Editar', $parameters = $asistencia->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                           

                                        </td>

                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {{$asistencias->links()}}
                        </div>
                    </div>
        
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna asistencia...</label>  </div>
                @endif
                
            </div>
            <!-- /.box -->
        </div>
    </div>

  
    
@endsection
@section('script')
   
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

     <script src="{{url('administration/plugins/select2/select2.full.min.js')}}"></script>

    <script>
        $(function() {
            $(".select2").select2();
            $.fn.datepicker.dates['en'] = {
                days: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
                daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                    "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                    "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                today: "Hoy",
                clear: "Clear",
                titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                weekStart: 0
            };
            $("#datepicker").datepicker({
                format: 'yyyy/mm/dd',
                language:'en'
            })
            $("#datepicker2").datepicker({
                format: 'yyyy/mm/dd',
                language:'en'
            })
        });
    </script>

    
    <script>
        $(function() {
                $.fn.datepicker.dates['en'] = {
                    days: [ "Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado" ],
                    daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
                    daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
                    months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio",
                        "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
                    monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun",
                        "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
                    today: "Hoy",
                    clear: "Clear",
                    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
                    weekStart: 0
                };
                $("#datepicker").datepicker({
                    format: 'yyyy/mm/dd',
                    language:'en'
                })
                $("#datepicker2").datepicker({
                    format: 'yyyy/mm/dd',
                    language:'en'
                })
            });

    </script>

      
@endsection