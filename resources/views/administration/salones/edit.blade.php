@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Laboratorios
           
        </h1>
       
    </section>
@endsection

@section('contenido')

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
            <h3 class="box-title">Edición de laboratorios</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($salon, ['route' => ['salones.update',$salon->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                       <div class="form-group">
                            {!! Form::label('Nombre del Laboratorio') !!}
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
                {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                {!! Form::close() !!}
        </div>

    </div>


@endsection
@section('script')
    <script src="{{url('administration/dist/js/roles/delete.js')}}"></script>
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>

@endsection