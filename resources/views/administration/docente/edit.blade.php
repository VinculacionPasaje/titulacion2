@extends('layouts.docente')
@section('title')
    <section class="content-header">
        <h1>
          Editar Usuario
     
        </h1>
       
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
            <h3 class="box-title">Editar Datos Usuario</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {{Form::model($usuario, ['route' => ['editarPerfil.update',$usuario->id],'method'=>'PUT','files' => true ])}}
            <div id="msj-success" class="alert alert-success alert-dismissible aprobado" role="alert" style="display:none">
                <strong> Usuario Modificado Correctamente.</strong>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
            <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
             <div class="row" ><!--Inicio de row -->
                 <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('DNI') !!}
                            {!! Form::text('dni',null,['placeholder'=>'Ingrese los Nombres','class'=>'form-control']) !!}
                        </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('Nombres') !!}
                        {!! Form::text('name',null,['placeholder'=>'Ingrese los Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                    </div>
                </div>

             </div>

            <div class="row" ><!--Inicio de row -->
                        <div class="col-md-6 col-xs-12">
                                <div class="form-group">
                                    {!! Form::label('Apellidos') !!}
                                    {!! Form::text('last_name',null,['placeholder'=>'Ingrese los Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                                </div>
                        </div>
                        <div class="col-md-6 col-xs-12">
                            <div class="form-group">
                                {!! Form::label('Dirección Domiciliaria') !!}
                                {!! Form::text('address',null,['placeholder'=>'Ingrese su dirección','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                            </div>
                        </div>

            </div>


            <div class="row" ><!--Inicio de row -->
                  
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('Contraseña') !!}
                       <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su password">
                    </div>
                </div>

                <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Abreviatura Título') !!}
                            {!! Form::text('abreviatura',null,['placeholder'=>'Ingrese la abreviatura del título','class'=>'form-control']) !!}
                        </div>
                </div>

            </div>


            <div class="row" ><!--Inicio de row -->
                 <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Correo') !!}
                            {!! Form::email('email',old('email'),['placeholder'=>'Ingrese el correo','class'=>'form-control']) !!}
                        </div>
                </div>

                 <div class="col-md-6 col-xs-12">
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

 <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

@endsection