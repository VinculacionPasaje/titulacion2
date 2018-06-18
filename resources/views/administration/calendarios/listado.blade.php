@extends('layouts.admin')
@section('title')
    <section class="content-header">
      <h1>
            Listado
    
        </h1>
    </section>
@endsection

@section('contenido')
    @if (session('mensaje-registro'))
        @include('mensajes.msj_correcto')
    @endif
     @if (session('mensaje-error'))
        @include('mensajes.msj_rechazado')
    @endif
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class= "col-xs-6 col-md-6" aling="center">
                        <h3 class="box-title">Asignaturas del calendario {{$calendario->titulo}}</h3>

                    </div>
                    
                   
                </div>
                <!-- /.box-header -->
               
                @if(count($asignaturas_calendarios) >0)  <!-- este if es para ver si hay datos registrados en la BD -->

                
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dia Semana</th>
                                    <th>Asignatura</th>
                                    <th>Hora Inicio</th>
                                    <th>Hora Fin</th>
                                    <th>Docente</th>
                                    <th>Semestre</th>
                                    <th>Calendario</th>
                                    
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asignaturas_calendarios as $calendario)
                                 @if($calendario->state !=0)
                                    <tr data-id="{{$calendario->id}}">
                                        <td class="sorting_1">{{$calendario->id}}</td>
                                        <td>{{$calendario->dia_semana}}</td>
                                           <td>{{$calendario->asignatura_semestre->asignatura->asignatura}}</td>
                                        
                                         <td>{{$calendario->hora_inicio}}</td>
                                          <td>{{$calendario->hora_fin}}</td>
                                            <td>{{$calendario->asignatura_semestre->asignatura->usuario->abreviatura .' '. $calendario->asignatura_semestre->asignatura->usuario->name  .' '. $calendario->asignatura_semestre->asignatura->usuario->last_name}}</td>
                                              <td>{{$calendario->asignatura_semestre->semestre->semestre}} {{$calendario->asignatura_semestre->semestre->paralelo}}</td>
                                        <td>{{$calendario->calendario->titulo}}</td>
                                      
                                        
                                        <td>
                                            {!!link_to_route('asignaturas_calendarios.edit', $title = 'Editar', $parameters = $calendario->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>

                                        </td>

                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {{$asignaturas_calendarios->links()}}
                        </div>
                    </div>
        
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningún horario...</label>  </div>
                @endif
                
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['asignaturas_calendarios.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}

    
@endsection
@section('script')
    <script src="{{url('administration/dist/js/roles/delete.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

      
@endsection