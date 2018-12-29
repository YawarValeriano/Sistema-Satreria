<?php

namespace SastRicAtelier;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    protected $table='orden_trabajo';

    protected $primaryKey='id_orden_trabajo';

    public $timestamps=false;

    protected $fillable =[
    	'sastre_id',
    	'cliente_ci',
    	'cantidad',
    	'precioUnitario',
    	'cuenta',
    	'fecha_inicio',
    	'fecha_entrega',
    	'flag_tipo',
    	'flag_estado',
    	'detalle'
    ];

    protected $guarded =[

    ];

}
