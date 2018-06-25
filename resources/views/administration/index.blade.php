@extends('layouts.admin')
@section('title')
    <section class="content-header">
        <h1>
            Dashboard Administrador
           
        </h1>
     
    </section>
@endsection


@section('contenido')



    <div class="row">
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>+</h3>

              <p>Agregar Nuevo Usuario</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="{{route('usuarios.create')}}" onclick="return myFunction();" class="small-box-footer">Agregar Usuario <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>+<sup style="font-size: 20px"></h3>

              <p>Asignaturas</p>
            </div>
            <div class="icon">
              <i class="ion ion-bookmark"></i>
            </div>
            <a href="{{route('asignaturas.create')}}" onclick="return myFunction();" class="small-box-footer">Agregar Asignaturas <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>+</h3>

              <p>Calendario</p>
            </div>
            <div class="icon">
              <i class="ion ion-calendar"></i>
            </div>
            <a href="{{route('calendarios.create')}}" onclick="return myFunction();" class="small-box-footer">Crear Calendario <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>+</h3>

              <p>Asistencias</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="{{route('asistencias.index')}}"  onclick="return myFunction();" class="small-box-footer">Ver asistencias <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

         <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-morado">
            <div class="inner">
              <h3>+</h3>

              <p>Salón de Clases</p>
            </div>
            <div class="icon">
              <i class="ion ion-briefcase"></i>
            </div>
            <a href="{{route('salones.create')}}" onclick="return myFunction();" class="small-box-footer">Crear Salón Clase <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


         <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-cafe">
            <div class="inner">
              <h3>+</h3>

              <p>Reportes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="{{route('reportes.index')}}" onclick="return myFunction();" class="small-box-footer">Generar Reporte <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->
@endsection
