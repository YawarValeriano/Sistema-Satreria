<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SastRicAtelier\Http\Requests\OrdenFormRequest;
use SastRicAtelier\Cliente;
use SastRicAtelier\Orden;
use Illuminate\Support\Facades\Auth;
use DB;

use Carbon\Carbon;
use Response;
use Illuminate\Support\Collection;

class OrdenController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request)
	{
		if($request)
		{
			$query=trim($request->get('searchText'));
			$ordenes=DB::table('orden_trabajo as i')
				->join('cliente as p','i.cliente_ci','=','p.CI')
				->select('i.id_orden_trabajo',DB::raw('CONCAT(p.nombre," ",p.apellidos) as cliente'),'i.cantidad','i.precioUnitario',DB::raw('i.cantidad*i.precioUnitario as total'),'i.saldo','i.fecha_inicio','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.observaciones')
				->where('p.nombre','LIKE','%'.$query.'%')
				->orwhere('p.apellidos','LIKE','%'.$query.'%')
				->orwhere('p.CI','LIKE','%'.$query.'%')
				->groupBy('i.id_orden_trabajo','p.nombre','p.apellidos','i.cantidad','i.precioUnitario','i.saldo','i.fecha_inicio','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.observaciones')
				->paginate(7);
			return view('ordenes.index',["ordenes"=>$ordenes,"searchText"=>$query]);
		}
	}
	public function create()
	{
		$clientes=DB::table('cliente')->get();
		return view("ordenes.create",["clientes"=>$clientes]);
	}
	public function store (OrdenFormRequest $request)
	{
		$orden=new Orden;
		$orden->id_orden_trabajo=$request->get('id_orden_trabajo');
		$orden->sastre_id=Auth::id();
		$orden->cliente_ci=$request->get('cliente_ci');
		$orden->cantidad=$request->get('cantidad');
		$orden->precioUnitario=$request->get('precioUnitario');
		$orden->saldo=$request->get('saldo');
		$orden->fecha_inicio= Carbon::now()->toTimeString();
		$orden->fecha_entrega=$request->get('fecha_entrega');
		$orden->flag_tipo=$request->get('flag_tipo');
		$orden->flag_estado=0;
		$orden->observaciones=$request->get('observaciones');
		$orden->save();
		return Redirect::to('compras/ingreso');
	}
	public function show($id)
    {
    	$ingreso=DB::table('ingreso as i')
			->join('persona as p','i.id_proveedor','=','p.id_persona')
			->join('ing_arti as ia','i.id_ingreso','=','ia.id_ingreso')
			->select('i.id_ingreso','i.fecha_hora','p.nombre','i.tipo_actividad','i.num_comprobante','i.estado',DB::raw('sum(ia.cantidad*ia.precio_compra) as total'))
			->where('i.id_ingreso','=',$id)
			->groupBy('i.id_ingreso','i.fecha_hora','p.nombre','i.tipo_actividad','i.num_comprobante','i.estado')
			->first();

		$detalles=DB::table('ing_arti as ia')
			->join('articulo as a','ia.id_articulo','=','a.id_articulo')
			->select('a.nombre as articulo','ia.cantidad','ia.precio_compra','ia.precio_venta')
			->where('ia.id_ingreso','=',$id)
			->get();

        return view("compras.ingreso.show",["ingreso"=>$ingreso,"detalles"=>$detalles]); 
    }
   
}
