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
               
                @if(count($asignaturas_calendarios) >0)  <!-- este if es para ver si hay datos registrados en la BD -->
                  
                
                
                 <div class="ajax-tabla">
                        <div class="box-body table-responsive no-padding" >
                            <table id="example2" class="table table-hover" >
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Dia Semana</th>
                                    <th>Asignatura</th>
                                     <th>Semestre</th>
                                    <th>Horario</th>
                                    
                                    <th>Laboratorio / Aula Clase</th>
                                    
                                  
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($asignaturas_calendarios as $calendario)
                                 @if($calendario->state !=0)
                                    <tr data-id="{{$calendario->id}}">
                                        <td class="sorting_1">{{$calendario->id}}</td>
                                        <td>{{$calendario->dia_semana}}</td>
                                          <td>{{$calendario->asignatura->asignatura}}</td>
                                          <td>{{$calendario->asignatura->semestre->semestre}} {{$calendario->asignatura->semestre->paralelo}}</td>
                                         <td>{{$calendario->hora_inicio}} - {{$calendario->hora_fin}}</td>
                                        
                                         <td>{{$calendario->calendario->salon->salon_clase}}</td>
                                      
                                        
                                      

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
  


    

@endsection
@section('script')


@endsection

