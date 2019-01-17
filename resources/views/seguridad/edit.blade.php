@extends ('layouts.main')
@section ('contenido')
      <section class="content-header">
      	<div class="row">
      		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
      			<h3>Editar Usuario {{$usuario->name}} {{$usuario->last_name}}</h3>
      			@if (count($errors)>0)
      			<div class="alert alert-danger">
      				<ul>
      				@foreach ($errors->all() as $error)
      					<li>{{$error}}</li>
      				@endforeach
      				</ul>
      			</div>
      			@endif
                  </div>
            </div>
      </section>
      <section class="content">
		{!!Form::model($usuario,['method'=>'PATCH','route'=>['seguridad.update',$usuario->id]])!!}
            {{Form::token()}}
                  <input type="text" name="name"  value="{{$usuario->name}}" hidden="true">
                  <input type="text" name="last_name"  value="{{$usuario->last_name}}" hidden="true">
                  <input type="date" name="birthday" value="{{$usuario->birthday}}" hidden="true">
                  <div class="form-group">
                  	<label for="email">E-Mail</label>
                  	<input type="email" name="email" class="form-control" value="{{$usuario->email}}" placeholder="E-Mail...">
                  </div>
                  <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Contraseña</label>
                        <input id="password" type="password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                              <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                              </span>
                        @endif
                  </div>
                  <div class="form-group">
                        <label for="password-confirm">Confirmar Contraseña</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                  </div>
                  <div class="form-group">
                  	<button class="btn btn-primary" type="submit">Guardar</button>
                  	<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                  </div>

		{!!Form::close()!!}		
      </section>
@endsection