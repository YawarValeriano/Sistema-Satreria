@extends('layouts.main')
@section('contenido')
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="box box-success">
			<div class="box-header with-border">
				<div class="row">
			        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<h3 class="box-title">Listado de Órdenes <a href="{{url('orden/create')}}"><button class="btn btn-success">Nuevo</button></a></h3>
			        </div>
			    </div>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
						@include('ordenes.search')
					</div>
				</div>
			    <div class="row">
			    	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			          	<div class="table-responsive">
			          		<table class="table table-bordered table-striped table-hover">
			          			<thead>
			          				<th>ID Orden</th>
			          				<th>Cliente</th>
			          				<th>Cant</th>
			          				<th>Bs. Total</th>
			          				<th>A/C </th>
			          				<th>Total</th>
			          				<th>Saldo</th>
			          				<th>Fecha Ini</th>
									<th>Fecha Prueba</th>
			          				<th>Fecha Ent</th>
			          				<th>Tipo</th>
			          				<th>Estado</th>
			          				<th>Detalle</th>
			          				<th>Opciones</th>
			          			</thead>
			          			@foreach($ordenes as $or)
			          				<tr>
			          					<td>{{$or->id_orden_trabajo}}</td>
			          					<td>{{$or->cliente}}</td>
			          					<td>{{$or->cantidad}}</td>
			          					<td>{{$or->precioUnitario}}</td>
			          					<td>{{$or->cuenta}}</td>
			          					<td>{{$or->total}}</td>
			          					<td>{{$or->saldo}}</td>
			          					<td>{{$or->fecha_inicio}}</td>
										<td>{{$or->fecha_prueba}}</td>
										<td>{{$or->fecha_entrega}}</td>
			          					@if ( $or->flag_tipo === 0 )
			          						<td>Confección</td>
			          					@else
			          						<td>Arreglo</td>
			          					@endif

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
			          					<td>{{$or->detalle}}</td>
			          					<td>
			          						
			          						<a href="{{URL::action('OrdenController@show', $or->id_orden_trabajo)}}" target="_blank" class="btn btn-info btn-sm glyphicon glyphicon-print"> Imprimir</a>
                         					@if( $or->flag_estado == 3)
                         						<a href=""><button class="btn btn-success btn-sm" disabled>Cambiar Estado</button></a>
                         					@else
                         						<a href="" data-target="#modal-orden" data-id_orden_trabajo="{{$or->id_orden_trabajo}}" data-flag_estado="{{$or->flag_estado}}" data-toggle="modal"><button class="btn btn-success btn-sm">Cambiar Estado</button></a>
                         					@endif

			          					</td>
			          				</tr>
			          				@include('ordenes.modal')
			          			@endforeach
			          		</table>
			          	</div>
			          	{{$ordenes->render()}}
			        </div>
			        <!-- /.col -->
			    </div>
			    <!-- /.row -->
			</div>
		</div>		
	</div>
@endsection