<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SastRicAtelier\Http\Requests\OrdenFormRequest;
use SastRicAtelier\Cliente;
use SastRicAtelier\Orden;
use DB;

uuse Carbon\Carbon;
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
				->select('i.id_orden_trabajo',DB::raw('CONCAT(p.nombre," ",p.apellidos)'),'i.precioUnitario','p.saldo','i.fecha_inicio','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.observaciones')
				->where('p.nombre','LIKE','%'.$query.'%')
				->orwhere('p.apellidos','LIKE','%'.$query.'%')
				->orwhere('p.CI','LIKE','%'.$query.'%')
				->groupBy('i.id_orden_trabajo','i.precioUnitario','p.saldo','i.fecha_inicio','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.observaciones')
				->paginate(7);
			return view('clientes.index',["ordenes"=>$ordenes,"searchText"=>$query]);
		}
	}
	public function create()
	{
		$clientes=DB::table('cliente')->get();
		return view("compras.ingreso.create",["clientes"=>$clientes]);
	}
	public function store (IngresoFormRequest $request)
	{
		try {
			DB::beginTransaction();
			$ingreso=new Ingreso();
			$ingreso->id_proveedor=$request->get('id_proveedor');
			$ingreso->num_comprobante=$request->get('num_comprobante');
			$time = Carbon::now('America/La_Paz');
			$ingreso->fecha_hora=$time->toDateTimeString();
			$ingreso->estado='A';
			$ingreso->tipo_actividad='Compra';
			$ingreso->save();

			$id_articulo=$request->get('id_articulo');
			$cantidad=$request->get('cantidad');
			$p_compra=$request->get('precio_compra');
			$p_venta=$request->get('precio_venta');

			$cont=0;
			while ($cont < count($id_articulo)) {
				$detalle= new Ing_Arti;
				$detalle->id_ingreso=$ingreso->id_ingreso;
				$detalle->id_articulo=$id_articulo[$cont];
				$detalle->cantidad=$cantidad[$cont];
				$detalle->precio_compra=$p_compra[$cont];
				$detalle->precio_venta=$p_venta[$cont];
				$detalle->save();
				$cont=$cont+1;
			}
			DB::commit();
		} catch (Exception $e) {
			DB::rollback();
		}
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
   	public function destroy($id)
    {
        $ingreso=Ingreso::findOrFail($id);
        $ingreso->estado='C';
        $ingreso->update();
        return Redirect::to('compras/ingreso');
    }
}
