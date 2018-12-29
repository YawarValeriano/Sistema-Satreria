@extends ('layouts.main')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Editar Cliente: {{ $cliente->nombre}} {{ $cliente->apellidos}}</h3>
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif

			{!!Form::model($cliente,['method'=>'PATCH','route'=>['cliente.update',$cliente->CI]])!!}
            {{Form::token()}}
            <div class="form-group">
            	<label for="CI">CI</label>
            	<input disabled type="text" name="CI" class="form-control" value="{{$cliente->CI}}">
            </div>
            <div class="form-group">
            	<label for="telefono">Teléfono</label>
            	<input type="text" name="telefono" class="form-control" value="{{$cliente->telefono}}" placeholder="Teléfono...">
            </div>
            <div class="form-group">
            	<label for="descripcion">Dirección</label>
            	<input type="text" name="zona" class="form-control" value="{{$cliente->zona}}" placeholder="Dirección...">
            </div>
            <div class="form-group">
            	<button class="btn btn-primary" type="submit">Guardar</button>
            	<a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
            </div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection