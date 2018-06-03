@extends('layouts.docente')
@section('title')
    <section class="content-header">
        <h1>
            Dashboard Docente
            
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

              <p>Mi Perfil</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="{{route('docente.mi_perfil')}}" class="small-box-footer">Ver mi perfil <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-4 col-xs-12">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>+<sup style="font-size: 20px"></h3>

              <p>Asistencias</p>
            </div>
            <div class="icon">
              <i class="ion ion-clock"></i>
            </div>
            <a href="{{route('docente.asistencias')}}" class="small-box-footer">Ver asistencias <i class="fa fa-arrow-circle-right"></i></a>
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
            <a href="{{route('docente.materias')}}" class="small-box-footer">Ver Calendario <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
       
      </div>
      <!-- /.row -->
@endsection