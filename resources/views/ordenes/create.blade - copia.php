@extends ('layouts.main')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Pedido</h3>
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
      <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="CI">CI</label>
                        <input type="number" required name="CI" class="form-control" value="{{old('CI')}}" autofocus>
                  </div>
            </div>
      </div>
            {!!Form::open(array('url'=>'orden','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
      <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input disabled type="text" required name="nombre" id="nombre" class="form-control" value="{{old('nombre')}}">
                  </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="apellidos">Apellidos</label>
                        <input disabled type="text" required name="apellidos" id="apellidos" class="form-control" value="{{old('apellidos')}}">
                  </div>
            </div>
      </div>
      <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input disabled type="integer" required name="telefono" id="telefono" class="form-control" value="{{old('telefono')}}">
                  </div>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for="zona">Dirección</label>
                        <input disabled type="text" required name="zona" id="zona" class="form-control" value="{{old('zona')}}">
                  </div>
            </div>
      </div>
      <div class="row">
            <div class="panel panel-primary" style="margin: 15px;">
                  <div class="panel-body">
                        <div class="col-lg-2 col-sm-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" required name="cantidad" id="cantidad" class="form-control">
                              </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                              <div class="form-group">
                                    <label for="detalle">Detalle</label>
                                    <input type="text" required name="detalle" id="detalle" class="form-control">
                              </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-md-6 col-xs-6">
                              <div class="form-group">
                                    <label for="precioUnitario">Precio Total (Bs.)</label>
                                    <input type="number" required name="precioUnitario" id="precioUnitario" class="form-control">
                              </div>
                        </div>
                        <div class="col-lg-2 col-sm-6 col-md-6 col-xs-6">
                              <div class="form-group">
                                    <label for="precioUnitario">A cuenta (Bs.)</label>
                                    <input type="number" required name="precioUnitario" id="precioUnitario" class="form-control">
                              </div>
                        </div>
                  </div>
            </div>
            
      </div>
      <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                  </div>
            </div>
      </div>


            {!!Form::close()!!}           
            
@endsection
