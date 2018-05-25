@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Calendario<small>Agregar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Calendario</li>
            <li class="active">Agregar</li>
        </ol>
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
            <h3 class="box-title">Nuevo Calendario</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'calendarios.store','method'=>'POST']) !!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                        <div class="form-group">
                            {!! Form::label('Titulo') !!}
                            {!! Form::text('titulo',null,['placeholder'=>'Ingrese titulo del calendario','class'=>'form-control']) !!}
                        </div>

                         <div class="form-group">
                            {!! Form::label('Descripción') !!}
                            {!! Form::text('descripcion',null,['placeholder'=>'Ingrese una descripción','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                        </div>

                        <div class="row" ><!--Inicio de row -->
                            <div class="col-md-4 col-xs-12">
                                     <div class="form-group">
                                        <label>Salón de clases</label>
                                        <select class="form-control select2" name="salon_id" id="salon_id" style="width: 100%;" >
                                            <option value="" disabled selected>Seleccione el salón de clase</option>
                                            @foreach($salones as $salon)
                                                <option value="{{$salon->id}}" >  {{ $salon->salon_clase }} </option>
                                            @endforeach
                                        </select>
                                    </div>
                            </div>

                                    <div class="col-md-4 col-xs-12">

                                            <div class="form-group">
                                                <label>Año Lectivo</label>
                                                <select class="form-control select2" name="anio_id" id="anio_id" style="width: 100%;" >
                                                    <option value="" disabled selected>Seleccione el año</option>
                                                    @foreach($anios as $anio)
                                                        <option value="{{$anio->id}}" >  {{ $anio->anio }} </option>
                                                    @endforeach
                                                </select>
                                            </div>


                                        
                                    </div>

                                    <div class="col-md-4 col-xs-12">

                                        <div class="form-group">
                                                <label>Hemisemestre</label>
                                                <select class="form-control select2" name="hemisemestres" id="hemisemestres" style="width: 100%;" >
                                                    <option value="" disabled selected>Seleccione el hemisemestre</option>
                                                
                                                        <option value="1er" >  Primer Hemisemestre </option>
                                                        <option value="2do" >  Segundo Hemisemestre </option>
                                                
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

@endsection