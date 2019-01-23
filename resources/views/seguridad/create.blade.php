@extends ('layouts.main')
@section ('contenido')
      <section class="content-header">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <h3>Nuevo Usuario</h3>
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
            <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                              <div class="panel-heading">Registro</div>
                                    <div class="panel-body">
                                    	{!!Form::open(array('url'=>'seguridad','method'=>'POST','autocomplete'=>'off'))!!}
                                          {{Form::token()}}
                                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                <label for="name" class="col-md-4 control-label">Nombre</label>
                                                <div class="col-md-6">
                                                      <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                                      @if ($errors->has('name'))
                                                            <span class="help-block">
                                                                  <strong>{{ $errors->first('name') }}</strong>
                                                            </span>
                                                      @endif
                                                </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                                <label for="last_name" class="col-md-4 control-label">Apellido</label>
                                                <div class="col-md-6">
                                                      <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required>
                                                      @if ($errors->has('last_name'))
                                                            <span class="help-block">
                                                                  <strong>{{ $errors->first('last_name') }}</strong>
                                                            </span>
                                                      @endif
                                                </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('birthday') ? ' has-error' : '' }}">
                                                <label for="birthday" class="col-md-4 control-label">Fecha Nacimiento</label>
                                                <div class="col-md-6">
                                                      <div class="input-group date">
                                                            <div class="input-group-addon">
                                                                  <i class="fa fa-calendar"></i>
                                                            </div>
                                                            <input type="text" class="form-control pull-right" id="datepicker" name="birthday" required value="{{old('birthday')}}">
                                                      </div>
                                                      @if ($errors->has('birthday'))
                                                            <span class="help-block">
                                                                  <strong>{{ $errors->first('birthday') }}</strong>
                                                            </span>
                                                      @endif
                                                </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                <label for="email" class="col-md-4 control-label">E-Mail</label>
                                                <div class="col-md-6">
                                                      <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                                      @if ($errors->has('email'))
                                                            <span class="help-block">
                                                                  <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                      @endif
                                                </div>
                                          </div>
                                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                                <label for="password" class="col-md-4 control-label">Contraseña</label>
                                                <div class="col-md-6">
                                                      <input id="password" type="password" class="form-control" name="password" required>
                                                      @if ($errors->has('password'))
                                                            <span class="help-block">
                                                                  <strong>{{ $errors->first('password') }}</strong>
                                                            </span>
                                                      @endif
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                                                <div class="col-md-6">
                                                      <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                                                      <label><input type="radio" name="type" class="flat-red" value=1>Administrador</label>
                                                </div>
                                                <div class="col-lg-3 col-sm-3 col-md-6 col-xs-6" style="margin-top: 5px">
                                                      <label><input type="radio" name="type" class="flat-red" value=0>Sastre</label>
                                                </div>
                                          </div>
                                          <div class="form-group">
                                                <div class="col-md-6 col-md-offset-4">
                                                      <button type="submit" class="btn btn-primary">Registrar</button>
                                                    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar</a>
                                                </div>
                                          </div>
                                          {!!Form::close()!!}           
                                    </form>
                              </div>
                        </div>
                  </div>
            </div>      
      </section>
@endsection
@section('scripts')
<script>
      $(function () {
            $('#datepicker').datepicker({
                  autoclose: true,
            })
            //Flat red color scheme for iCheck
            $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
                  checkboxClass: 'icheckbox_flat-green',
                  radioClass   : 'iradio_flat-green'
            })
      })
</script>
@endsection