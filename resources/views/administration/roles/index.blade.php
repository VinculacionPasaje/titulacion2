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
                        <h3 class="box-title">Roles Registrados</h3>

                    </div>
                    
                   
                </div>
                <!-- /.box-header -->
               
                @if(count($roles) >0)  <!-- este if es para ver si hay datos registrados en la BD -->
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Rol</th>
                                    <th>Descripción</th>
                                    <th>Acción</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($roles as $rol)
                                 @if($rol->state !=0)
                                    <tr data-id="{{$rol->id}}">
                                        <td class="sorting_1">{{$rol->id}}</td>
                                        <td>{{$rol->rol}}</td>
                                        <td>{{$rol->description}}</td>
                                        <td>
                                            {!!link_to_route('roles.edit', $title = 'Editar', $parameters = $rol->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            @if($rol->id !=1)
                                            <button type="button" class="btn btn-danger btn-sm btn-delete"  ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>
                                            @endif

                                        </td>

                                    </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                            {{$roles->links()}}
                        </div>
                    </div>
        
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningún rol...</label>  </div>
                @endif
                
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['roles.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
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