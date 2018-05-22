@extends('layouts.base')

@section('contenido')
<div class="container">
    <div class="row">
        <div class="col-md-3 ">


         </div>
        <div class="col-md-6">
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
                <div class="panel-heading" style="font-size:  30px;text-align: center;padding-bottom: 15px;">Recuperar Contraseña</div>


                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label" style="max-width:100%;">Correo Electrónico <span style="font-weight:bold;color:#e65540; max-width:100%; "> *</span></label>

                              <div class="col-md-6" style="max-width: 100%;">
                                <div class="input-group">
                                    <span class="input-group-addon" style="border:none;"><i class="fa fa-envelope"> </i></span>
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Ingrese su email" required style="background-color: #f0f0f0;">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="row">

                                <div class="col-md-4" style="max-width: 100%;">

                                </div>

                                <div class="col-md-4" style="max-width: 100%;">


                                        <div class="form-group">
                                            <div class="col-md-4" style="max-width: 100%;">
                                                <button type="submit" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4" style="font-weight: bold;">
                                                    Enviar
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

        <div class="col-md-3 ">


         </div>


        </div>
    </div>
</div>
@endsection
