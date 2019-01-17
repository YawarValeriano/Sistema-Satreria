@extends('layouts.main')
@section('contenido')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<h3 class="box-title">Listado de Usuarios <a href="seguridad/create"><button class="btn btn-success">Nuevo</button></a></h3>
			        </div>
			    </div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						@include('seguridad.search')
					</div>
				</div>
			    <div class="row">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<div class="table-responsive">
			          		<table class="table table-bordered table-striped table-hover">
			          			<thead>
			          				<th>ID</th>
			          				<th>Nombre</th>
			          				<th>Apellido</th>
			          				<th>E-Mail</th>
			          				<th>Fecha Nac.</th>
			          				<th>Opciones</th>
			          			</thead>
			          			@foreach($usuarios as $cl)
			          				<tr>
			          					<td>{{$cl->id}}</td>
			          					<td>{{$cl->name}}</td>
			          					<td>{{$cl->last_name}}</td>
			          					<td>{{$cl->email}}</td>
			          					<td>{{$cl->birthday}}</td>
			          					<td>
			          						<a href="{{URL::action('UsuarioController@edit', $cl->id)}}"><button class="btn btn-info">Editar</button></a>
                         					<a href="" data-target="#modal-delete-{{$cl->id}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
			          					</td>
			          				</tr>
			          				@include('seguridad.modal')
			          			@endforeach
			          		</table>
			          	</div>
			          	{{$usuarios->render()}}
			        </div>
			        <!-- /.col -->
			    </div>
			    <!-- /.row -->
			</div>
		</div>		
	</div>
@stop