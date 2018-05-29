@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Año Lectivo<small>Agregar</small></h1>
      
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
            <h3 class="box-title">Nuevo Año Lectivo</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'anios.store','method'=>'POST']) !!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                        <div class="form-group">
                            {!! Form::label('Anio') !!}
                            {!! Form::text('anio',null,['placeholder'=>'Ingrese el año lectivo','class'=>'form-control','onkeypress'=>'return soloNumeros(event)']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Descripción') !!}
                            {!! Form::text('descripcion',null,['placeholder'=>'Ingrese la descripcion','class'=>'form-control']) !!}
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