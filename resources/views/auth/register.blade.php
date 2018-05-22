@extends('layouts.base')


@section('title')
<title>REGISTRO </title>

@endsection

@section('contenido')

    <div class="row">
        <div class="col-md-2">

        


         </div>

        <div class="col-md-8">
            @if (session('mensaje-registro'))
				@include('mensajes.msj_correcto')
			@endif
			@if(!$errors->isEmpty())
				<div class="alert alert-danger">
					<p><strong>Error!! </strong>Corrija los siguientes errores</p>
					<ul>
						@foreach($errors->all() as $error)
							<li>{{$error}}</li>
						@endforeach
					</ul>
				</div>
			@endif
            
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size:  30px;text-align: center;padding-bottom: 15px;">REGISTRO</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="row">

                                <div class="col-md-6" style="max-width: 100%;">

                                        <div class="form-group{{ $errors->has('dni') ? ' has-error' : '' }}">
                                            <label for="dni" class="col-md-6 control-label">Identificación  <span style="font-weight:bold;color:#e65540;"> *</span></label>

                                            <div class="col-md-6" style="max-width: 100%;">

                                                <div class="input-group">
                                                    <span class="input-group-addon" style="border:none;"><i class="fa fa-address-card"> </i></span>
                                                    <input id="dni" type="text" class="form-control" name="dni" value="{{ old('dni') }}" placeholder="Ingrese su identificación"  required  style="background-color: #f0f0f0;">
                                                </div>
                                               
                                                @if ($errors->has('dni'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('dni') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                </div>

                            <div class="col-md-6" style="max-width: 100%;">

                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                        <label for="name" class="col-md-6 control-label">Nombres <span style="font-weight:bold;color:#e65540;"> *</span></label>

                                        <div class="col-md-6" style="max-width: 100%;">

                                            <div class="input-group">
                                                <span class="input-group-addon" style="border:none;"><i class="fa fa-user"> </i></span>
                                            <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Ingrese sus nombres"  required style="background-color: #f0f0f0;">
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                </div>

                        </div>


                    <div class="row">

                        <div class="col-md-6" style="max-width: 100%;">



                            <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-6 control-label">Apellidos <span style="font-weight:bold;color:#e65540;"> *</span></label>

                                <div class="col-md-6" style="max-width: 100%;">

                                    <div class="input-group">
                                        <span class="input-group-addon" style="border:none;"><i class="fa fa-user"> </i></span>
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Ingrese sus apellidos"  required style="background-color: #f0f0f0;">
                                    </div>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>

                         <div class="col-md-6" style="max-width: 100%;">

                                <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                    <label for="name" class="col-md-6 control-label">Dirección <span style="font-weight:bold;color:#e65540;"> *</span></label>

                                    <div class="col-md-6" style="max-width: 100%;">
                                        <div class="input-group">
                                            <span class="input-group-addon" style="border:none;"><i class="fa fa-building"> </i></span>
                                        <input id="address" type="text" class="form-control" name="address" value="{{ old('address') }}" placeholder="Ingrese su dirección" required  style="background-color: #f0f0f0;">
                                        </div>
                                        @if ($errors->has('address'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('address') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail <span style="font-weight:bold;color:#e65540;"> *</span></label>

                             <div class="col-md-6" style="max-width: 100%;">
                                 <div class="input-group">
                                    <span class="input-group-addon" style="border:none;"><i class="fa fa-envelope"> </i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su email" required  style="background-color: #f0f0f0;">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                    <div class="row">

                        <div class="col-md-6" style="max-width: 100%;">

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label">Password <span style="font-weight:bold;color:#e65540;"> *</span></label>

                             <div class="col-md-6" style="max-width: 100%;">
                                 <div class="input-group">
                                    <span class="input-group-addon" style="border:none;"><i class="fa fa-lock"> </i></span>
                                <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su password" required  style="background-color: #f0f0f0;">
                                </div>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </div>

                        <div class="col-md-6" style="max-width: 100%;">

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-6 control-label" style="max-width: 100%;">Confirmar Password <span style="font-weight:bold;color:#e65540;"> *</span></label>

                             <div class="col-md-6" style="max-width: 100%;">
                                 <div class="input-group">
                                    <span class="input-group-addon" style="border:none;"><i class="fa fa-lock"> </i></span>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirme su password"  required style="background-color: #f0f0f0;">
                                </div>
                            </div>
                        </div>

                        
                        </div>


                        </div>

                        <div class="row">

                            <div class="col-md-4" style="max-width: 100%;">

                            </div>

                            <div class="col-md-4" style="max-width: 100%;">


                            <div class="form-group">
                                <div class="col-md-4" style="max-width: 100%;">
                                    <button type="submit" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" style="font-weight: bold;">
                                        Registrar
                                    </button>
                                </div>
                            </div>

                            </div>

                            <div class="col-md-4" style="max-width: 100%;">

                            </div>

                        </div>


                    </form>
                </div>
            </div>




        </div>
         <div class="col-md-2 ">


         </div>
         
    </div>

@endsection
