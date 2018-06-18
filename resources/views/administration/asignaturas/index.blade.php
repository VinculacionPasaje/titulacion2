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
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class= "col-xs-6 col-md-6" aling="center">
                        <h3 class="box-title">Asignaturas Registradas</h3>

                    </div>
                    
                   
                </div>
                <!-- /.box-header -->
               
                @if(count($asignaturas) >0)  <!-- este if es para ver si hay datos registrados en la BD -->
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Asignatura</th>
                                    <th>Descripción</th>
                                    <th>Docente</th>
                                    <th>Semestre</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asignaturas as $asignatura)

                                 

                                    @if($asignatura->state !=0)
                                    <tr data-id="{{$asignatura->id}}">
                                        <td class="sorting_1">{{$asignatura->id}}</td>
                                        <td>{{$asignatura->asignatura}}</td>
                                        <td>{{$asignatura->descripcion}}</td>
                                        <td>{{$asignatura->usuario->abreviatura .' '. $asignatura->usuario->name  .' '. $asignatura->usuario->last_name}}</td>
                                        <td>

                                         @foreach($asignatura->semestres as $semestre)
                                        
                                        
                                        {{$semestre->semestre .' '. $semestre->paralelo}},

                                         @endforeach
                                        
                                        </td>
                                        <td>
                                            {!!link_to_route('asignaturas.edit', $title = 'Editar', $parameters = $asignatura->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>

                                        </td>

                                    </tr>
                                    @endif


                                 

           
                                @endforeach
                                </tbody>
                            </table>
                            {{$asignaturas->links()}}
                        </div>
                    </div>
        
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningúna asignatura...</label>  </div>
                @endif
                
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['asignaturas.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
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