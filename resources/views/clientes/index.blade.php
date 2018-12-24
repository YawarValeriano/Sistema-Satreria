<!--Falta la parte de registro-->
@extends('layouts.main')
@section('contenido')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<h3 class="box-title">Listado de Clientes <a href="cliente/create"><button class="btn btn-primary">Nuevo</button></a></h3>
			          	<div class="box-tools pull-right">
				            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
				            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
				        </div>
			          	
			        </div>
			    </div>
			</div>
			<div class="box-body">
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
			          						<a href=""><button class="btn btn-info">Editar</button></a>
			          						<a href=""><button class="btn btn-danger">Editar</button></a>
			          					</td>
			          				</tr>
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