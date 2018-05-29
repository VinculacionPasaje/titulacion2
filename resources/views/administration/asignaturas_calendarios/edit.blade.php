@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Asignaturas de Calendario
            
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


    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Edición de asignaturas de calendario</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($asignatura_calendario, ['route' => ['asignaturas_calendarios.update',$asignatura_calendario->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                    

                    <div class="row" ><!--Inicio de row -->
                            <div class="col-md-4 col-xs-12">
                                     <div class="form-group">
                                                <label>Asignatura</label>
                                                <select class="form-control" name="asignatura_id" id="asignatura_id" style="width: 100%;" >
                                                    <option value="" disabled selected>Asignatura</option>

                                                        @foreach($asignaturas as $asignatura)
                                                                @if($asignatura->id == $asignatura_calendario->asignatura->id)
                                                                    <option value="{{$asignatura->id}}" selected>  {{ $asignatura->asignatura }} </option>
                                                                @else
                                                                    <option value="{{$asignatura->id}}">  {{ $asignatura->asignatura }} </option>
                                                                @endif
                                                            @endforeach
                                                </select>
                                    </div>

          
                            </div>

                             <div class="col-md-4 col-xs-12">

                                <div class="form-group">

                                          <label>Calendario</label>
                                                <select class="form-control" name="calendario_id" id="calendario_id" style="width: 100%;" >
                                                    <option value="" disabled selected>Calendario</option>

                                                            @foreach($calendarios as $calendario)
                                                                @if($calendario->id == $asignatura_calendario->calendario->id)
                                                                    <option value="{{$calendario->id}}" selected>  {{ $calendario->titulo }} </option>
                                                                @else
                                                                    <option value="{{$calendario->id}}">  {{ $calendario->titulo }} </option>
                                                                @endif
                                                            @endforeach
                                                </select>

                                </div>


                                        
                            </div>

                            <div class="col-md-4 col-xs-12">

                                <div class="form-group">

                               

                                <label>Dia Semana</label>

                                     <select class="form-control select2" name="dia_semana" id="dia_semana" style="width: 100%;" >
                                
                            
                                        @if($asignatura_calendario->dia_semana == 'Lunes')
                                                        <option value="Lunes" selected>  Lunes </option>
                                                        <option value="Martes" > Martes </option>
                                                        <option value="Miercoles" > Miércoles </option>
                                                        <option value="Jueves" >  Jueves </option>
                                                        <option value="Viernes" >  Viernes </option>

                                        @else
                                            @if($asignatura_calendario->dia_semana == 'Martes')
                                                        <option value="Lunes" >  Lunes </option>
                                                        <option value="Martes" selected> Martes </option>
                                                        <option value="Miercoles" > Miércoles </option>
                                                        <option value="Jueves" >  Jueves </option>
                                                        <option value="Viernes" >  Viernes </option>

                                        @else
                                         @if($asignatura_calendario->dia_semana == 'Miercoles')
                                                        <option value="Lunes" >  Lunes </option>
                                                        <option value="Martes" > Martes </option>
                                                        <option value="Miercoles" selected> Miércoles </option>
                                                        <option value="Jueves" >  Jueves </option>
                                                        <option value="Viernes" >  Viernes </option>

                                        @else
                                         @if($asignatura_calendario->dia_semana == 'Jueves')
                                                        <option value="Lunes" >  Lunes </option>
                                                        <option value="Martes" > Martes </option>
                                                        <option value="Miercoles" > Miércoles </option>
                                                        <option value="Jueves" selected>  Jueves </option>
                                                        <option value="Viernes" >  Viernes </option>

                                        @else
                                         @if($asignatura_calendario->dia_semana == 'Viernes')
                                                        <option value="Lunes" >  Lunes </option>
                                                        <option value="Martes" > Martes </option>
                                                        <option value="Miercoles" > Miércoles </option>
                                                        <option value="Jueves" >  Jueves </option>
                                                        <option value="Viernes" selected>  Viernes </option>

                            
                                        @endif
                                        @endif
                                       @endif
                                        @endif
                                        @endif
                                        
                                
                                </select>
                                </div>


                                        
                            </div>

                            
                    </div>


                    <div class="row" ><!--Inicio de row -->

                                    <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                <label>Hora Inicio</label>
                                                <input type="text" class="timepicker" name="hora_inicio" style="width:100%; text-align:center" readonly="true" value="{{$asignatura_calendario->hora_inicio}}"/>
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                <label>Hora Fin</label>
                                                <input type="text" class="timepicker" name="hora_fin" style="width:100%; text-align:center" readonly="true" value="{{$asignatura_calendario->hora_fin}}"/>
                                        
                                        </div>
                                    
                                    </div>

                                         <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                               {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                                        </div>
                                    
                                    </div>



                                   
                        </div>


                       
               
                {!! Form::close() !!}
        </div>

    </div>


@endsection
@section('script')
    <script src="{{url('administration/dist/js/roles/delete.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>

@endsection