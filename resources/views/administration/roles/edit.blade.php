@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            ROLES
           
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
            <h3 class="box-title">Edición de Roles</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($rol, ['route' => ['roles.update',$rol->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                <div class="form-group">
                    {!! Form::label('ROL') !!}
                    {!! Form::text('rol',null,['placeholder'=>'ingrese el rol','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Descripción') !!}
                    {!! Form::text('description',null,['placeholder'=>'Ingrese descripcion','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
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