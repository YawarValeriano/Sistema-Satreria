@extends('layouts.main')
@section('contenido')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<h3 class="box-title">Listado de pendientes</h3>
			        </div>
			    </div>
			</div>
			<div class="box-body">
			    <div class="row">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<div class="table-responsive">
			          		<table class="table table-bordered table-striped table-hover">
			          			<thead>
			          				<th>ID Orden</th>
			          				<th>Detalle</th>
			          				<th>Cantidad</th>
			          				<th>Fecha de Entrega</th>
			          				<th>Estado</th>
			          				<th>Tipo</th>
			          				<th></th>
			          			</thead>
			          			@foreach($pendientes as $or)
			          				<tr>
			          					<td>{{$or->id_orden_trabajo}}</td>
			          					<td>{{$or->detalle}}</td>
			          					<td>{{$or->cantidad}}</td>
			          					<td>{{$or->fecha_entrega}}</td>
			          					@switch ( $or->flag_estado )
			          						@case(0)
			          							<td>Recibido</td>
			          							@break
			          						@case(1)
			          							<td>En Proceso</td>
			          							@break
			          						@case(2)
			          							<td>Finalizado</td>
			          							@break
			          						@case(3)
			          							<td>Entregado</td>
			          							@break
			          					@endswitch
			          					@if ( $or->flag_tipo === 0 )
			          						<td>Confección</td>
			          					@else
			          						<td>Arreglo</td>
			          					@endif
			          					<td>
                         					<a href="" data-target="#modal-pendiente" data-id_orden_trabajo="{{$or->id_orden_trabajo}}" data-flag_estado="{{$or->flag_estado}}" data-toggle="modal"><button class="btn btn-success btn-sm">Cambiar Estado</button></a>
			          					</td>
			          				</tr>
			          				@include('pendientes.modal')
			          			@endforeach
			          		</table>
			          	</div>
			          	{{$pendientes->render()}}
			        </div>
			        <!-- /.col -->
			    </div>
			    <!-- /.row -->
			</div>
		</div>		
	</div>
@endsection