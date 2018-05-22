<input type="hidden" name="ruta" id ="ruta" value="{{url('')}}">


   <div class="row" ><!--Inicio de row -->
                 <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('DNI') !!}
                            {!! Form::text('dni',null,['placeholder'=>'Ingrese los Nombres','class'=>'form-control']) !!}
                        </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('Nombres') !!}
                        {!! Form::text('name',null,['placeholder'=>'Ingrese los Nombres','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                    </div>
                </div>

    </div>

    <div class="row" ><!--Inicio de row -->
                 <div class="col-md-6 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Apellidos') !!}
                            {!! Form::text('last_name',null,['placeholder'=>'Ingrese los Apellidos','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                        </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('Dirección') !!}
                        {!! Form::text('address',null,['placeholder'=>'Ingrese su dirección','class'=>'form-control','onkeypress'=>'return soloLetras(event)']) !!}
                    </div>
                </div>

    </div>

    <div class="row" ><!--Inicio de row -->
                 <div class="col-md-6 col-xs-12">
                       <div class="form-group">
                            <label>Eliga  el rol</label>
                            <select class="form-control select2" name="rol_id" id="roles" style="width: 100%;" >
                                <option value="" disabled selected>Seleccione la categoria</option>
                                @foreach($roles as $rol)

                                 @if (old('rol_id') == $rol->id)
                                        <option value="{{$rol->id}}" selected> {{ $rol->rol }}</option>
                                    @else
                                        <option value="{{$rol->id}}"> {{ $rol->rol }}</option>
                                    @endif             

                                   
                                @endforeach
                            </select>
                        </div>
                </div>
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        {!! Form::label('Contraseña') !!}
                       <input id="password" type="password" class="form-control" name="password" placeholder="Ingrese su password">
                    </div>
                </div>

    </div>


       <div class="row" ><!--Inicio de row -->
                 <div class="col-md-12 col-xs-12">
                        <div class="form-group">
                            {!! Form::label('Correo') !!}
                            {!! Form::email('email',old('email'),['placeholder'=>'Ingrese el correo','class'=>'form-control']) !!}
                        </div>
                </div>
           
    </div>











