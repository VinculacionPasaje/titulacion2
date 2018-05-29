@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>Semestre</h1>
       
    </section>
@endsection
@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
     @if (session('mensaje-error'))
        @include('mensajes.msj_rechazado')
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
            <h3 class="box-title">Nuevo semestre</h3>
        </div><!-- /.box-header -->
        <div class="box-body">
            {!! Form::open(['route' => 'semestres.store','method'=>'POST']) !!}
                <input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">
                        <div class="form-group">
                            {!! Form::label('Semestre') !!}
                            <div class="form-group">
                          
                                    <select class="form-control select2" name="semestre" id="semestre" style="width: 100%;" >
                                        <option value="" disabled selected>Seleccione el semestre</option>
                                    
                                            <option value="1er" >  1er </option>
                                            <option value="2do" >  2do </option>
                                             <option value="3er" >  3er </option>
                                             <option value="4to" >  4to </option>
                                             <option value="5to" >  5to </option>
                                             <option value="6to" >  6to </option>
                                             <option value="7mo" >  7mo </option>
                                             <option value="8vo" >  8vo </option>
                                             <option value="9no" >  9no </option>
                                             <option value="10mo" >  10mo </option>
                                    
                                    </select>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('Paralelo') !!}
                           <div class="form-group">
                          
                                    <select class="form-control select2" name="paralelo" id="paralelo" style="width: 100%;" >
                                        <option value="" disabled selected>Seleccione el paralelo</option>
                                    
                                            <option value="A" >  A </option>
                                            <option value="B" >  B </option>
                                             <option value="C" >  C </option>
                                             <option value="D" >  D </option>
                                             <option value="E" >  E </option>
                                            
                                    
                                    </select>
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