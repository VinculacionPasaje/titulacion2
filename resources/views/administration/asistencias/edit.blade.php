@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Asistencia
           
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
            <h3 class="box-title">Justificación Falta</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($asistencia, ['route' => ['asistencias.update',$asistencia->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
               <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('¿Desea Justificar la falta de este docente?') !!}
                           
                        </div>
                </div>

                <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                           
                            <input type="radio" name="justificacion" value="1"> Si, justificar falta<br>
                            <input type="radio" name="justificacion" value="0"> No, justificar falta<br>
                        </div>
                </div>

                 <div class="col-md-4 col-xs-12">
                        <div class="form-group">
                           
                             {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                        </div>
                </div>
               
                {!! Form::close() !!}
        </div>

    </div>


@endsection
@section('script')
   
    <script src="{{url('administration/dist/js/validaNumerosLetras.js')}}"></script>

@endsection