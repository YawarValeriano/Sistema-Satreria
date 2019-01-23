@extends ('layouts.main')
@section ('contenido')
      <section class="content-header">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Nuevo Cliente</h3>
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
	{!!Form::open(array('url'=>'cliente','method'=>'POST','autocomplete'=>'off'))!!}
      {{Form::token()}}
      <section class="content">
            <div class="row">
                  <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                        <div class="form-group">
                              <label for="CI">CI</label>
                              <input type="number" name="CI" required value="{{old('CI')}}" class="form-control" placeholder="Ingrese CI..." autofocus>
                        </div>
                  </div>
            </div> 
            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input type="text" name="nombre" required value="{{old('nombre')}}" class="form-control" placeholder="Nombre...">
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="apellidos">Apellidos</label>
                              <input type="text" name="apellidos" value="{{old('apellidos')}}" class="form-control" placeholder="Apellidos...">
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="telefono">Teléfono</label>
                              <input type="text" name="telefono" value="{{old('telefono')}}" class="form-control" placeholder="Teléfono...">
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="zona">Dirección</label>
                              <input type="text" name="zona" required value="{{old('zona')}}" class="form-control" placeholder="Dirección...">
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <label for="zona">Correo Electrónico</label>
                              <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Correo Electrónico...">
                        </div>
                  </div>
            </div>
            <div class="row">
                  <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                        <div class="form-group">
                              <button class="btn btn-primary" type="submit">Guardar</button>
                              <button class="btn btn-danger" type="reset">Borrar todo</button>
                              <a href="{{ URL::previous() }}" class="btn btn-warning">Cancelar</a>
                        </div>
                  </div>
            </div>
      </section>
      {!!Form::close()!!}           
@endsection