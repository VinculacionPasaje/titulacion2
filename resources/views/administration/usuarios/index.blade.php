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
                    <h3 class="box-title">Usuarios Registrados</h3>

                
                </div>
                <!-- /.box-header -->
                 @if(count($usuarios) >0)

                  

                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Titulo</th>
                                    <th>Nombres</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Email</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $usuario)
                              
                                    <tr data-id="{{$usuario->id}}">
                                    
                                        <td>{{$usuario->dni}}</td>
                                        <td>{{$usuario->abreviatura}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->last_name}}</td>
                                        <td>{{$usuario->address}}</td>
                                        <td>{{$usuario->email}}</td>
                                        
                                        <td>
                                           
                                            {!!link_to_route('usuarios.edit', $title = 'Editar', $parameters = $usuario->id, $attributes = ['class'=>'btn  btn-primary btn-sm'])!!}
                                            <button type="button" class="btn btn-danger btn-sm btn-delete" ><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>


                                      
                                        </td>

                                    </tr>
                                   
                                @endforeach
                            </tbody>
                            </table>
                            {{$usuarios->links()}}
                        </div>
                    </div>

                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningun Usuario...</label>  </div>
                @endif
              
            </div>
            <!-- /.box -->
        </div>
    </div>

    {!! Form::open(['route' => ['usuarios.destroy', ':USER_ID'], 'method' => 'DELETE', 'id' => 'form-delete']) !!}
    {!! Form::close() !!}
@endsection
@section('script')
    <script src="{{url('administration/dist/js/usuarios/java-usuario.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>
@endsection