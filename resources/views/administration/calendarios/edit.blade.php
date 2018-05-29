@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Calendario
            
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
            <h3 class="box-title">Edición de calendario</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($calendario, ['route' => ['calendarios.update',$calendario->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                       <div class="form-group">
                            {!! Form::label('Titulo') !!}
                            {!! Form::text('titulo',null,['placeholder'=>'Ingrese un título para el calendario','class'=>'form-control']) !!}
                        </div>

                         <div class="form-group">
                            {!! Form::label('Descripcion') !!}
                            {!! Form::text('descripcion',null,['placeholder'=>'Ingrese una descripción','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                        </div>

                    <div class="row" ><!--Inicio de row -->
                            <div class="col-md-4 col-xs-12">
                                     <div class="form-group">
                                                <label>Salón Clases</label>
                                                <select class="form-control" name="salon_id" id="salon_id" style="width: 100%;" >
                                                    <option value="" disabled selected>Salón de clase</option>

                                                        @foreach($salones as $salon)
                                                                @if($salon->id == $calendario->salon->id)
                                                                    <option value="{{$salon->id}}" selected>  {{ $salon->salon_clase }} </option>
                                                                @else
                                                                    <option value="{{$salon->id}}">  {{ $salon->salon_clase }} </option>
                                                                @endif
                                                            @endforeach
                                                </select>
                                    </div>

          
                            </div>

                             <div class="col-md-4 col-xs-12">

                                <div class="form-group">

                                          <label>Año Lectivo</label>
                                                <select class="form-control" name="anio_id" id="anio_id" style="width: 100%;" >
                                                    <option value="" disabled selected>Año Lectivo</option>

                                                        @foreach($anios as $anio)
                                                                @if($anio->id == $calendario->anio->id)
                                                                    <option value="{{$anio->id}}" selected>  {{ $anio->anio }} </option>
                                                                @else
                                                                    <option value="{{$anio->id}}">  {{ $anio->anio }} </option>
                                                                @endif
                                                            @endforeach
                                                </select>

                                </div>


                                        
                            </div>

                            <div class="col-md-4 col-xs-12">

                                <div class="form-group">

                               

                                <label>Hemisemestre</label>

                                     <select class="form-control select2" name="hemisemestres" id="hemisemestres" style="width: 100%;" >
                                
                            
                                        @if($calendario->hemisemestres == '1er')
                                            <option value="1er"selected >  Primer Hemisemestre </option>
                                            <option value="2do" >  Segundo Hemisemestre </option>

                                        @else
                                            @if($calendario->hemisemestres == '2do')
                                                  <option value="1er" >  Primer Hemisemestre </option>
                                            <option value="2do" selected>  Segundo Hemisemestre </option>
                                        
                                       
                                        @endif
                                        @endif
                                        
                                
                                </select>
                                </div>


                                        
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