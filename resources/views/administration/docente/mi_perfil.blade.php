@extends('layouts.docente')
@section('title')
    <section class="content-header">
        <h1>
          Perfil Usuario
     
        </h1>
       
    </section>
@endsection

@section('contenido')


<div style="padding-top: 10px;">
  
  <div class="row">
        <!-- left column -->
        <div class="col-md-5 col-sm-6 col-xs-12">
            
                <div class="text-center">
                    <img src="{{url('fotos/user-min.png')}}" class="avatar img-circle img-thumbnail" alt="avatar">
                    
                </div>
        </div>
    <!-- Mi Perfil -->
             <div class="col-md-5 col-sm-6 col-xs-12 personal-info">
        
       
                        <div class="panel panel-primary">
                                <div class="panel-heading">
                                <h3 class="panel-title"  style="text-align:  center;font-weight: bold;">Información Personal</h3>
                                </div>
                            <div class="panel-body">
                                        
           
                                
                                <table class="table table-user-information">
                                    <tbody>
                                    <tr>
                                        <td><b>Cédula:</b></td>
                                        <td>{!! Auth::user()->dni !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Título:</b></td>
                                        <td>{!! Auth::user()->abreviatura !!}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Nombres:</b></td>
                                        <td>{!! Auth::user()->name !!}</td>
                                    </tr>

                                    <tr>
                                
                                    <td><b>Apellidos:</b></td>
                                        <td>{!! Auth::user()->last_name !!}</td>
                                    </tr>

                                    <tr>
                                        <td><b>Dirección:</b></td>
                                        <td>{!! Auth::user()->address !!}</td>
                                        
                                    </tr>
                                        
                                   
                                    <tr>
                                        <td><b>Email</b></td>
                                        <td>{!! Auth::user()->email !!}</td>
                                    </tr>
                                  

                                  
                                  

                                    
                                    
                                    </tbody>
                                </table>
                                
                                <span class="pull-right">
                                        {!!link_to_route('editarPerfil.edit', $title = 'Editar Datos', $parameters = Auth::user()->id, $attributes = ['class'=>'btn  btn-primary btn-md'])!!}
                                </span>
                                
                            
                            </div>
                                
                            
                     </div>
        
            </div>

           
             <div class="col-md-2 col-sm-6 col-xs-12">
                  <!--No borrar este div, porque se daña el diseño


                   -->
            </div>

            

           
    
            
    </div>
    </div>
</div>

    

@endsection
@section('script')


@endsection