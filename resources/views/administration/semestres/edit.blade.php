@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            SEMESTRES
            <small>Editar</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">SEMESTRES</li>
            <li class="active">Editar</li>
        </ol>
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
            <h3 class="box-title">Edición de Semestres</h3>
        </div><!-- /.box-header -->

        <div id="notificacion_resul_fanu"></div>
        <div class="box-body">
            {{Form::model($semestre, ['route' => ['semestres.update',$semestre->id],'method'=>'PUT' ])}}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                <div class="form-group">
                    {!! Form::label('Semestre') !!}
                    <div class="form-group">
                        
                        <select class="form-control select2" name="semestre" id="semestre" style="width: 100%;" >
                        
                    
                                @if($semestre->semestre == '1er')
                                    <option value="1er" selected>  1er </option>
                                    <option value="2do" >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>
                                @else
                                     @if($semestre->semestre == '2do')
                                    <option value="1er" >  1er </option>
                                    <option value="2do" selected >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>
                                 @else
                                     @if($semestre->semestre == '3er')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" selected>  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>
                                @else
                                     @if($semestre->semestre == '4to')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" selected >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>
                                @else
                                     @if($semestre->semestre == '5to')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" selected>  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>

                                @else
                                     @if($semestre->semestre == '6to')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" selected>  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>

                                @else
                                     @if($semestre->semestre == '7mo')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo" selected >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>

                                @else
                                     @if($semestre->semestre == '8vo')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" selected>  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>

                                @else
                                     @if($semestre->semestre == '9no')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" selected>  9no </option>
                                             <option value="10mo" >  10mo </option>

                                @else
                                     @if($semestre->semestre == '10mo')
                                    <option value="1er" >  1er </option>
                                    <option value="2do"  >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo9" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo"selected >  10mo </option>

                                @endif
                                 @endif
                                  @endif
                                   @endif
                                    @endif
                                     @endif
                                      @endif
                                       @endif
                                        @endif
                                         @endif
                        
                        </select>
                    </div>

                    
                </div>
                <div class="form-group">
                    {!! Form::label('Paralelo') !!}
                          <div class="form-group">
                                
                                <select class="form-control select2" name="paralelo" id="paralelo" style="width: 100%;" >
                                
                            
                                        @if($semestre->paralelo == 'A')
                                            <option value="A" selected>  A </option>
                                            <option value="B">  B </option>
                                             <option value="C">  C </option>
                                              <option value="D">  D </option>
                                               <option value="E">  E </option>

                                        @else
                                            @if($semestre->paralelo == 'B')
                                                <option value="A" >  A </option>
                                                <option value="B" selected>  B </option>
                                                <option value="C">  C </option>
                                                <option value="D">  D </option>
                                                <option value="E">  E </option>
                                        
                                        @else
                                            @if($semestre->paralelo == 'C')
                                                <option value="A" >  A </option>
                                                <option value="B">  B </option>
                                                <option value="C" selected>  C </option>
                                                <option value="D">  D </option>
                                                <option value="E">  E </option>
                                        
                                        @else
                                            @if($semestre->paralelo == 'D')
                                                <option value="A" >  A </option>
                                                <option value="B">  B </option>
                                                <option value="C">  C </option>
                                                <option value="D" selected>  D </option>
                                                <option value="E">  E </option>
                                        
                                        @else
                                            @if($semestre->paralelo == 'E')
                                                <option value="A" >  A </option>
                                                <option value="B">  B </option>
                                                <option value="C">  C </option>
                                                <option value="D">  D </option>
                                                <option value="E" selected>  E </option>
                                        @endif
                                        @endif
                                        @endif
                                        @endif
                                        @endif
                                        
                                
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