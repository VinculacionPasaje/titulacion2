@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Salones de clases<small>Agregar</small></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
            <li class="active">Salones de clases</li>
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
            <h3 class="box-title">Nuevo Salon de Clases</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'salones.store','method'=>'POST']) !!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                        <div class="form-group">
                            {!! Form::label('Nombre del Laboratorio o salón de clases') !!}
                            {!! Form::text('salon_clase',null,['placeholder'=>'Ingrese el laboratorio','class'=>'form-control']) !!}
                        </div>

                         <div class="form-group">
                            {!! Form::label('Ubicación') !!}
                            {!! Form::text('ubicacion',null,['placeholder'=>'Ingrese la ubicación del laboratorio','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('Descripción') !!}
                            {!! Form::text('descripcion',null,['placeholder'=>'Ingrese la descripcion','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
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