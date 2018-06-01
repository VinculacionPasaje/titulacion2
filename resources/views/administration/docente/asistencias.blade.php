@extends('layouts.docente')
@section('title')
    <section class="content-header">
        <h1>
          Perfil Usuario
     
        </h1>
       
    </section>
@endsection

@section('contenido')


<div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class= "col-xs-6 col-md-6" aling="center">
                        <h3 class="box-title">Horarios Registrados</h3>

                    </div>
                    
                   
                </div>
                <!-- /.box-header -->
               
                @if(count($asistencias) >0)  <!-- este if es para ver si hay datos registrados en la BD -->
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Firma</th>
                                    <th>Hora Asistencia</th>
                                    <th>Justificación</th>
                                    <th>Asignatura</th>
                                    <th>Semestre</th>
                                    
                                   
                                    
                                  
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asistencias as $asistencia)

                                    @foreach($asignaturas_calendarios as $item)

                                     @if($asistencia->detalle_calendario_id == $item->id)
                                        <tr data-id="{{$asistencia->id}}">
                                            <td class="sorting_1">{{$asistencia->fecha}}</td>
                                            <td>{{$asistencia->firma}}</td>
                                            <td>{{$asistencia->hora}}</td>
                                             @if($asistencia->justificacion ==0) <!--no justifico falta -->
                                               <td>No</td>

                                              @else

                                              @if($asistencia->justificacion ==1)   <!--si justifico falta -->

                                              <td>Si</td>

                                              


                                              @else

                                                @if($asistencia->justificacion ==2)   <!--si asitio a la hora -->

                                                  <td>------</td>


                                                @endif
                                                @endif
                                                @endif
                                            
                                            <td>{{$item->asignatura->asignatura}}</td>
                                            <td>{{$item->asignatura->semestre->semestre}} {{$item->asignatura->semestre->paralelo}}</td>
                                           
                                            
                                         
                                        
                                            
                                        

                                        </tr>
                                    @endif



                                    @endforeach



                                
                                @endforeach
                                </tbody>
                            </table>
                            {{$asistencias->links()}}
                        </div>
                    </div>
        
                @else
                    <br/><div class='rechazado'><label style='color:#FA206A'>...No se ha encontrado ninguna asistencia...</label>  </div>
                @endif
                
            </div>
            <!-- /.box -->
        </div>
</div>
  


    

@endsection
@section('script')


@endsection