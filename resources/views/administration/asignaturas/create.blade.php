@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Asignaturas</h1>
       
    </section>
@endsection
@section('contenido')
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
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Nueva asignatura</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'asignaturas.store','method'=>'POST']) !!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                        <div class="form-group">
                            {!! Form::label('Asignatura') !!}
                            {!! Form::text('asignatura',null,['placeholder'=>'Ingrese la asignatura','class'=>'form-control']) !!}
                        </div>

                         <div class="form-group">
                            {!! Form::label('Descripcion') !!}
                            {!! Form::text('descripcion',null,['placeholder'=>'Ingrese una descripción','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                        </div>

                        <div class="row" ><!--Inicio de row -->
                            <div class="col-md-6 col-xs-12">
                                     <div class="form-group">
                                        <label>Docente</label>
                                        <select class="form-control select2" name="user_id" id="user_id" style="width: 100%;" >
                                            <option value="" disabled selected>Seleccione el docente</option>
                                            @foreach($usuarios as $usuario)
                                                <option value="{{$usuario->id}}" >  {{ $usuario->abreviatura .' '.$usuario->name.' '.$usuario->last_name }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                                    <div class="col-md-6 col-xs-12">

                                        <div class="form-group">
                                                <label>Semestres</label>
                                                <select class="form-control select2" multiple="multiple" data-placeholder="Selecione los semestres" name ="semestres[]" style="width: 100%;">
                                                    @foreach($semestres as $semestre)
                                                        <option value="{{$semestre->id}}" >  {{ $semestre->semestre.' '.$semestre->paralelo }} </option>
                                                    @endforeach
                                                </select>
                                        </div>


                                        
                                    </div>
                            
                        </div>

                       


                   
                        {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@section('script')
        <script src="{{url('administration/dist/js/roles/delete.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
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
                format: 'dd/mm/yyyy',
                language:'en'
            })
            $("#datepicker2").datepicker({
                format: 'dd/mm/yyyy',
                language:'en'
            })
        });
    </script>

@endsection