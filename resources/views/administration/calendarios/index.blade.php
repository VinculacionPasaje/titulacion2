@extends('layouts.admin')
@section('title')
    <section class="content-header" style="text-align: center;">
        <h1>
            CALENDARIOS REGISTRADOS
            
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
              
               
                @if(count($calendarios) >0)  <!-- este if es para ver si hay datos registrados en la BD -->

                 <div class="row" style="padding-top: 10px;">

                 @foreach($calendarios as $calendario)
                                 @if($calendario->state !=0)

                                
                            
                                        <div class="col-md-4">
                                            <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                    <div style="padding-right: 20px;"> 
                                                      <h3 class="panel-title" style="text-align:  center;font-weight: bold;">{{$calendario->titulo}}</h3>
                                                    </div>
                                                    <div class="actions pull-right">
                                                        <i class="fa fa-chevron-down"></i>
                                                        
                                                    </div>
                                                </div>
                                                <div class="panel-body">
                                                    <table id="example2" class="table table-hover">

                                                        <tr>
                                                           <th>Capacidad:</th>
                                                            @if($calendario->tamanio ==0)
                                                               <td style="background-color: RED;">{{$calendario->tamanio}}</td>
                                                               @else
                                                                <td>{{$calendario->tamanio}}</td>


                                                            @endif
                                                        </tr>

                                                           
                                                            <tr>

                                                                <th>Laboratorio:</th>

                                                                <td>{{$calendario->salon->salon_clase}}</td>

                                                               

                                                            </tr>

                                                            <tr>

                                                                <th>Año:</th>

                                                                 <td>{{$calendario->anio->anio}}</td>

                                                               

                                                            </tr>

                                                              <tr>

                                                                <th>Hemisemestre:</th>

                                                                 <td>{{$calendario->hemisemestres}}</td>

                                                               

                                                            </tr>

                                                            <tr>

                                                                <th>Descripción:</th>

                                                                 <td>{{$calendario->descripcion}}</td>

                                                               

                                                            </tr>

                                                            

                                                     </table>

                                                    
                                                    <form action="{{url('administracion/calendarioEliminar/')}}/{{$calendario->id}}" method="POST" style="text-align: center;">
                                                        {{csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                           <div class="row">
                            
                                                                <div class="col-md-6">
                                                                  {!!link_to('administracion/calendario/'.$calendario->id.'', $title = 'Ver Detalles', $attributes = ['class'=>'btn  btn-azul btn-md'], $secure = null )!!}
                                         

                                                                </div>

                                                                 <div class="col-md-6">

                                                                     {!!link_to('administracion/calendarioAgregar/'.$calendario->id.'', $title = 'Agregar', $attributes = ['class'=>'btn  btn-naranja btn-md'], $secure = null )!!}

                                                                </div> 
                                                            </div>

                                                             <div class="row">
                            
                                                                <div class="col-md-6">
                                                                  {!!link_to_route('calendarios.edit', $title = 'Editar', $parameters = $calendario->id, $attributes = ['class'=>'btn  btn-verde btn-md'])!!}

                                                                </div>

                                                                 <div class="col-md-6">

                                                                        <button type="submit" class="btn  btn-danger btn-md"  style="width: 100%;"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp;Eliminar</button>

                                                                </div> 
                                                            </div>

                                                      
                                                   
                                                    

                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                 


                                 @endif
                @endforeach

                   </div>

                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ningún calendario...</label>  </div>
                @endif

                        
                  
     
        </div>
    </div>



    
@endsection
@section('script')

    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $(".aprobado").fadeOut(300);
            },3000);
        });
    </script>

      
@endsection