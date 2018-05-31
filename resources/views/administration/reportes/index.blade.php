<!-- select * from asistencia where fecha BETWEEN '2018-05-28' AND '2018-05-28'  -->
@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Generar reporte
    
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

                    {!! Form::open(['route' => 'asistencia.pdf','method'=>'GET']) !!}
                    <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">

                    <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Eliga la Fecha Inicial') !!}
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" class="form-control pull-right" id="datepicker" name = "fecha_inicial" value="{{old('fecha_inicial')}}">
                            </div>
                        </div>
                    </div>


                    <div class="col-md-3 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Eliga la Fecha Final') !!}
                                <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" autocomplete="off" class="form-control pull-right" id="datepicker2" name = "fecha_final" value="{{old('fecha_final')}}">
                            </div>
                        </div>
                    </div>

                     <div class="col-md-3 col-xs-12">
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

                               <div class="col-md-3 col-xs-12">

                                        <div class="form-group">
                                                {!! Form::submit('Generar reporte',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    
                                    </div>

                         {!! Form::close() !!}



                </div>

                
               
                
                
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