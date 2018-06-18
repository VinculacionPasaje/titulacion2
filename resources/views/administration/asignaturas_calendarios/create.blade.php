@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Asignaturas del Calendario</h1>
       
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
            <h3 class="box-title">Llene las siguientes opciones:</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'asignaturas_calendarios.store','method'=>'POST']) !!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                       

                        <div class="row" ><!--Inicio de row -->

                                    <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                <label>Día de la semana</label>
                                                <select class="form-control select2" name="dia_semana" id="dia_semana" style="width: 100%;" >
                                                    <option value="" disabled selected>Seleccione el día de la semana</option>
                                                
                                                        <option value="Lunes" >  Lunes </option>
                                                        <option value="Martes" > Martes </option>
                                                        <option value="Miercoles" > Miércoles </option>
                                                        <option value="Jueves" >  Jueves </option>
                                                        <option value="Viernes" >  Viernes </option>
                                                
                                                </select>
                                            </div>
                                      </div>


                            <div class="col-md-4 col-xs-12">
                                     <div class="form-group">
                                        <label>Asignatura</label>
                                        <select class="form-control select2" name="asignatura_semestre_id" id="asignatura_semestre_id" style="width: 100%;" >
                                            <option value="" disabled selected>Seleccione la asignatura</option>
                                            @foreach($asignaturas as $asignatura)

                                                
                                                     <option value="{{$asignatura->id}}" >  {{ $asignatura->asignatura->asignatura }} - {{ $asignatura->semestre->semestre }} {{ $asignatura->semestre->paralelo }}  </option>
                                        
                                        
                                                   

                                                  
                                                
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                                    <div class="col-md-4 col-xs-12">

                                            <div class="form-group">
                                                <label>Calendario</label>
                                                <select class="form-control select2" name="calendario_id" id="calendario_id" style="width: 100%;" >
                                                    <option value="" disabled selected>Seleccione el calendario</option>
                                                    @foreach($calendarios as $calendario)
                                                        <option value="{{$calendario->id}}" >  {{ $calendario->titulo }} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        
                                    </div>

                                   
                                                                    
                        </div>


                        <div class="row" ><!--Inicio de row -->

                                    <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                <label>Hora Inicio</label>
                                                <input type="text" class="timepicker" name="hora_inicio" style="width:100%; text-align:center" readonly="true"/>
                                        
                                        </div>
                                    
                                    </div>

                                    <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                <label>Hora Fin</label>
                                                <input type="text" class="timepicker" name="hora_fin" style="width:100%; text-align:center" readonly="true"/>
                                        
                                        </div>
                                    
                                    </div>

                                     <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
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