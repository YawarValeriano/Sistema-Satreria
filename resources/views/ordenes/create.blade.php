@extends ('layouts.main')
@section ('contenido')
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h3>Nuevo Pedido
                        <a href="{{route('cliente.create')}}">
                              <button class="btn btn-success">Agregar Cliente</button>
                        </a>
                  </h3>
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
                  <div class="form-group">
                        <label for="CI">CI</label>
                        <div >
                              <select name="CI" class="form-control selectpicker" id="CI" data-live-search="true" onchange="alerta(this.value);" required>
                                    <option disabled selected></option>
                                    @foreach($clientes as $cl)
                                          <option value="{{$cl->CI}}">{{$cl->CI}}</option>
                                    @endforeach
                              </select>
                              
                        </div>
            <!--                    <input type="number" required name="carnet" id="carnet" class="form-control">
                 <div id="lista_carnet"></div> -->
                  </div>
            </div>
      </div>
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
                                    <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                                          <label><input type="radio" name="flag_tipo" required value=0 data-toggle="collapse" data-target="#fecha_p:not(.in)">Confección</label>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                                          <label><input type="radio" name="flag_tipo"required value=1 data-toggle="collapse" data-target="#fecha_p.in">Arreglo</label>
                                    </div>


                              </div>
                        </div>
                        <div class="row" style="margin-top: 10px">
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
                        <div class="row">
                              <div class="panel-collapse collapse" id="fecha_p">
                                    <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                          <div class="form-group">
                                                <label for="fecha_prueba">Fecha de prueba</label>
                                                <div class="input-group date">
                                                      <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                      </div>
                                                      <input type="text" class="form-control pull-right" id="datepicker1" name="fecha_prueba">
                                                </div>
                                                <!-- /.input group -->
                                          </div>
                                    </div>
                              </div>
                              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                    <div class="form-group">
                                          <label for="fecha_entrega">Fecha de entrega</label>
                                          <div class="input-group date">
                                                <div class="input-group-addon">
                                                      <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right" id="datepicker2" name="fecha_entrega" required value="{{old('fecha_entrega')}}">
                                          </div>
                                          <!-- /.input group -->
                                    </div>
                              </div>
                        </div>
                  </div>
            </div>
            
      </div>
      <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <button class="btn btn-primary" type="submit" onclick="return validar();">Guardar</button>
                        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                  </div>
            </div>
      </div>
            {!!Form::close()!!}
@endsection
@section('scripts')
<script>
      var valores = {!! json_encode($clientes) !!};
      function alerta(valor){
            var cliente = valores.find(x => x.CI == valor);
            var nombre=cliente.nombre;
            var apellido=cliente.apellidos;
            var dir=cliente.zona;
            var telef=cliente.telefono;
            document.getElementById("nombre").value = nombre;
            document.getElementById("apellidos").value = apellido;
            document.getElementById("zona").value = dir;
            document.getElementById("telefono").value = telef;
      }
      function validar(){
            var precio=document.getElementById('precioUnitario').value;
            var cuenta=document.getElementById('cuenta').value;
            precio=parseFloat(precio);
            cuente=parseFloat(cuenta);
            if (cuenta>precio) {
                  alert("Campo 'A Cuenta' NO debe ser mayor a 'Precio Total'");
                  document.getElementById('cuenta').value="";
                  document.getElementById('cuenta').autofocus=true;
                  return false;
            }
            return true;
      }
      // $('input[name="flag_tipo"]').on('ifChecked', function (event) {
      //       if ($(this).val() === 1) {
      //             document.getElementsByName('fecha_prueba')[0].value="";
      //       }
      // });
</script>
<script>
      var date = new Date();
      date.setDate(date.getDate());
      $(function () {
            $('#datepicker1').datepicker({
                  autoclose: true,
                  startDate: new Date()
            })
            $('#datepicker2').datepicker({
                autoclose: true,
                startDate: new Date()
            })
        //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass   : 'iradio_flat-green'
            })
      })
</script>
@endsection