<div class="modal fade modal-slide-in-right" aria-hidden="true"
role="dialog" tabindex="-1" id="modal-pendiente">
	{{Form::Open(array('route'=>['pendiente.update',$or->id_orden_trabajo],'method'=>'POST'))}}
	{{method_field('PATCH')}}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" 
				aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title">Editar estado de Orden</h4>
			</div>
			<div class="modal-body">
				<p id="cabecera"></p>
				<input type="hidden" name="id_orden_trabajo" id="id_orden_trabajo">
				<div class="form-group" style="margin-left: 70px">
					<div >
                  		<label>{{Form::radio('flag_estado',1,true)}}En Proceso</label>
					</div>
					<div >
	                  	<label>{{Form::radio('flag_estado',2,false)}}Finalizado para Entregar</label>
					</div>
					<div >
	                  	<label>{{Form::radio('flag_estado',3,false)}}Entregar</label>
					</div>
               	</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>