<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use SastRicAtelier\Http\Requests\OrdenFormRequest;
use SastRicAtelier\Cliente;
use SastRicAtelier\Orden;
use Illuminate\Support\Facades\Auth;
use DB;

class PendienteController extends Controller
{
     public function __construct()
	{
		$this->middleware('auth');
	}
	public function index()
	{
		$pendientes=DB::table('orden_trabajo as i')
			->join('cliente as p','i.cliente_ci','=','p.CI')
			->select('i.id_orden_trabajo','i.cantidad',DB::raw('DATE_FORMAT(i.fecha_entrega, "%d-%m-%Y") as fecha_entrega'),'i.flag_tipo','i.flag_estado','i.detalle')
			->where('i.flag_estado','LIKE',0)
			->orwhere('i.flag_estado','LIKE',1)
			->orderBy('i.fecha_entrega','asc')
			->groupBy('i.id_orden_trabajo','i.cantidad','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.detalle')
			->paginate(7);
		return view('pendientes.index',["pendientes"=>$pendientes]);
	}
	public function update(Request $request){
		$orden=Orden::findOrFail($request->id_orden_trabajo);
       	$val=$request->flag_estado;
       	$orden->flag_estado=($val);
        $orden->update();
        return Redirect::to('pendiente');
	}
}
