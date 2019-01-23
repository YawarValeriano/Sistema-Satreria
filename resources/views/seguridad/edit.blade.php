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
          @if($usuario->id != Auth::user()->id)

          <div class="row">
          @if($usuario->type==0)
              <div class="form-group">
                  <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                      <label><input type="radio" name="type" class="flat-red" value=1>Administrador</label>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                      <label><input type="radio" name="type" class="flat-red" value=0 checked>Sastre</label>
                  </div>
              </div>
          @else
              <div class="form-group">
                  <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                      <label><input type="radio" name="type" class="flat-red" value=1 checked>Administrador</label>
                  </div>
                  <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                      <label><input type="radio" name="type" class="flat-red" value=0>Sastre</label>
                  </div>
              </div>
              @endif
          </div>
          @endif
          <div class="form-group" style="margin-top: 10px">
              <button class="btn btn-primary" type="submit">Guardar</button>
              <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
          </div>



		{!!Form::close()!!}		
      </section>
@endsection
@section('scripts')
    <script>
        $(function () {

            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                checkboxClass: 'icheckbox_flat-green',
                radioClass   : 'iradio_flat-green'
            })
        })
    </script>
@endsection