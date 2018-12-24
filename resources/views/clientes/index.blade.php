@extends('layouts.main')
@section('contenido')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<h3 class="box-title">Listado de Clientes</h3>
			        </div>
			    </div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						@include('clientes.search')
					</div>
				</div>
			    <div class="row">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<div class="table-responsive">
			          		<table class="table table-bordered table-striped table-hover">
			          			<thead>
			          				<th>CI</th>
			          				<th>Nombre</th>
			          				<th>Apellidos</th>
			          				<th>Teléfono</th>
			          				<th>Zona</th>
			          				<th>Opciones</th>
			          			</thead>
			          			@foreach($cliente as $cl)
			          				<tr>
			          					<td>{{$cl->CI}}</td>
			          					<td>{{$cl->nombre}}</td>
			          					<td>{{$cl->apellidos}}</td>
			          					<td>{{$cl->telefono}}</td>
			          					<td>{{$cl->zona}}</td>
			          					<td>
			          						<a href="{{URL::action('ClienteController@edit', $cl->CI)}}"><button class="btn btn-info">Editar</button></a>
                         					<a href="" data-target="#modal-delete-{{$cl->CI}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
			          					</td>
			          				</tr>
			          				@include('clientes.modal')
			          			@endforeach
			          		</table>
			          	</div>
			          	{{$cliente->render()}}
			        </div>
			        <!-- /.col -->
			    </div>
			    <!-- /.row -->
			</div>
		</div>		
	</div>
@stop