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
            {!!Form::open(array('url'=>'orden','method'=>'POST', 'name'=>'cliente' ,'autocomplete'=>'off'))!!}
            {{Form::token()}}
      <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <label for="CI">CI</label>
                  <div class="input-group input-group-sm">
                        <input type="number" required name="CI" class="form-control" value="{{old('CI')}}" autofocus >
                        <span class="input-group-btn">
                              <button class="btn btn-info btn-flat">Buscar</button>
                        </span>
                  </div>
            </div>
      </div>
            {!!Form::close()!!}
            {!!Form::open(array('url'=>'orden','method'=>'POST',  'name'=>'datos' ,'autocomplete'=>'off'))!!}
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
            
      <div class="row" >
            <div class="panel panel-primary" style="margin: 15px;">
                  <div class="panel-body">
                        <div class="row">
                              <div class="form-group" >
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-4" style="margin-top: 25px">
                                          <label><input type="radio" name="flag_tipo" class="flat-red" required value=0>Confección</label>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-4" style="margin-top: 25px">
                                          <label><input type="radio" name="flag_tipo" class="flat-red" required value=1>Arreglo</label>
                                    </div>
                              </div>
                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                          <label for="fecha_entrega">Fecha de entrega</label>
                                          <div class="input-group date">
                                                <div class="input-group-addon">
                                                      <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="datepicker" name="fecha_entrega" required value="{{old('fecha_entrega')}}">
                                          </div>
                                          <!-- /.input group -->
                                    </div>
                              </div>
                        </div>
                        <div class="row">
                              <div class="col-lg-2 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                          <label for="cantidad">Cantidad</label>
                                          <input type="number" required name="cantidad" id="cantidad" class="form-control" value="{{old('cantidad')}}">
                                    </div>
                              </div>
                              <div class="col-lg-6 col-sm-12 col-md-12 col-xs-12">
                                    <div class="form-group">
                                          <label for="detalle">Detalle</label>
                                          <textarea type="text" required name="detalle" id="detalle" class="form-control" value="{{old('detalle')}}" style="width: 100%; max-width: 100%; height: 60px; max-height:100px "></textarea>
                                    </div>
                              </div>
                              <div class="col-lg-2 col-sm-6 col-md-6 col-xs-6">
                                    <div class="form-group">
                                          <label for="precioUnitario">Precio Total (Bs.)</label>
                                          <input type="number" required name="precioUnitario" id="precioUnitario" class="form-control" value="{{old('precioUnitario')}}">
                                    </div>
                              </div>
                              <div class="col-lg-2 col-sm-6 col-md-6 col-xs-6">
                                    <div class="form-group">
                                          <label for="cuenta">A cuenta (Bs.)</label>
                                          <input type="number" required name="cuenta" id="cuenta" class="form-control" value="{{old('cuenta')}}">
                                    </div>
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
