@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Asignatura
           
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
            <h3 class="box-title">Edición de asignaturas</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($asignatura, ['route' => ['asignaturas.update',$asignatura->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                       <div class="form-group">
                            {!! Form::label('Asignatura') !!}
                            {!! Form::text('asignatura',null,['placeholder'=>'Ingrese el laboratorio','class'=>'form-control']) !!}
                        </div>

                         <div class="form-group">
                            {!! Form::label('Descripcion') !!}
                            {!! Form::text('descripcion',null,['placeholder'=>'Ingrese la ubicación del laboratorio','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                        </div>

                    <div class="row"  style="padding-bottom: 25px;"><!--Inicio de row -->
                         

                        <div class="col-md-6 col-xs-12">


                                <label>Docente</label>
                                <select class="form-control" name="user_id" id="user_id" style="width: 100%;" >
                                    <option value="" disabled selected>Seleccione el docente</option>

                                        @foreach($usuarios as $user)
                                                @if($user->id == $asignatura->usuario->id)
                                                    <option value="{{$user->id}}" selected>  {{ $user->abreviatura.' '.$user->name.' '.$user->last_name }} </option>
                                                @else
                                                    <option value="{{$user->id}}">  {{ $user->abreviatura.' '.$user->name.' '.$user->last_name }} </option>
                                                @endif
                                            @endforeach
                                </select>



                            </div>



           

                              <div class="col-md-6 col-xs-12">


                                <label>Docente</label>
                                <select class="form-control" name="semestre_id" id="semestre_id" style="width: 100%;" >
                                    <option value="" disabled selected>Seleccione el semestre</option>

                                        @foreach($semestres as $semestre)
                                                @if($semestre->id == $asignatura->semestre->id)
                                                    <option value="{{$semestre->id}}" selected>  {{  $semestre->semestre .' '.$semestre->paralelo }} </option>
                                                @else
                                                    <option value="{{$semestre->id}}">  {{ $semestre->semestre .' '.$semestre->paralelo }} </option>
                                                @endif
                                            @endforeach
                                </select>



                            </div>
                            
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