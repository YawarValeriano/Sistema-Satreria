<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use SastRicAtelier\Http\Requests\OrdenFormRequest;
use SastRicAtelier\Http\Requests\ClienteFormRequest;
use SastRicAtelier\Cliente;
use SastRicAtelier\Orden;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;
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
		//DB::raw('i.cantidad*i.precioUnitario as total')
		if($request)
		{
			DB::statement("SET lc_time_names = 'es_ES'");
			$query=trim($request->get('searchText'));
			$ordenes=DB::table('orden_trabajo as i')
				->join('cliente as p','i.cliente_ci','=','p.CI')
				->select('i.id_orden_trabajo',DB::raw('CONCAT(p.nombre," ",p.apellidos) as cliente'),'i.cantidad','i.precioUnitario',DB::raw('i.precioUnitario as total'),DB::raw('(i.precioUnitario - i.cuenta) as saldo'),'i.cuenta',DB::raw('DATE_FORMAT(i.fecha_inicio, "%d-%b-%Y") as fecha_inicio'),DB::raw('DATE_FORMAT(i.fecha_entrega, "%d-%b-%Y") as fecha_entrega'),'i.flag_tipo','i.flag_estado','i.detalle')
				->where('p.nombre','LIKE','%'.$query.'%')
				->orwhere('p.apellidos','LIKE','%'.$query.'%')
				->orwhere('p.CI','LIKE','%'.$query.'%')
				->orderBy('i.id_orden_trabajo','DESC')
				->groupBy('i.id_orden_trabajo','p.nombre','p.apellidos','i.cantidad','i.precioUnitario','i.cuenta','i.fecha_inicio','i.fecha_entrega','i.flag_tipo','i.flag_estado','i.detalle')
				->paginate(7);
			return view('ordenes.index',["ordenes"=>$ordenes,"searchText"=>$query]);
		}
	}
	public function create()
	{
				//->select(DB::raw('concat(CI, " ", nombre, " ", apellidos, " ", telefono) as valores'))
		$clientes=DB::table('cliente')
				->get();
		return view('ordenes.create',["clientes"=>$clientes]);
	}
	public function store (OrdenFormRequest $request)
	{
		$hoy=Carbon::today();
		$aux=count(DB::table('orden_trabajo')->select('sastre_id')->where(DB::raw('MONTH(fecha_inicio)'),'LIKE',$hoy->month)->get());
		$num=self::nro_orden($aux+1);
		$orden=new Orden;
		$orden->id_orden_trabajo=$hoy->year."-".$hoy->month."-".$num;
		$orden->sastre_id=Auth::id();
		$orden->cliente_ci=$request->get('CI');
		$orden->cantidad=$request->get('cantidad');
		$orden->precioUnitario=$request->get('precioUnitario');
		$orden->cuenta=$request->get('cuenta');
		$orden->fecha_inicio= $hoy;
		$formato_fecha=new Carbon($request->get('fecha_entrega'));
		$orden->fecha_entrega=$formato_fecha->format('Y-m-d');
		$orden->flag_tipo=$request->get('flag_tipo');
		$orden->flag_estado=0;
		$orden->detalle=$request->get('detalle');
		$orden->save();
		return Redirect::to('orden');
	}
	public function nro_orden($numero){
		return str_pad($numero, 4,'0', STR_PAD_LEFT);
	}
	public function update(Request $request){
		$orden=Orden::findOrFail($request->id_orden_trabajo);
        $orden->flag_estado=$request->flag_estado;
        $orden->update();
        return Redirect::to('orden');
	}
	// public function fetch(Request $request)
 //    {
 //     	if($request->get('query'))
 //     	{
	//       	$query = $request->get('query');
	//       	$data = DB::table('cliente')
	//         		->where('CI', 'LIKE', "%{$query}%")
	//         		->get();
 //      		$output = '<ul class="dropdown-menu" style="display:block; position:relative">';
	//     	foreach($data as $row)
	//       	{
	//        		$output .= '<li><a href="#">'.$row->CI.'</a></li>';
	//       	}
 //      		$output .= '</ul>';
 //      		echo $output;
 //     	}
 //    }
   	public function show($id){
   		DB::statement("SET lc_time_names = 'es_ES'");
		$orden=DB::table('orden_trabajo as i')
				->join('cliente as p','i.cliente_ci','=','p.CI')
				->select('i.id_orden_trabajo','p.CI',DB::raw('CONCAT(p.nombre," ",p.apellidos) as cliente'),'i.cantidad',DB::raw('i.precioUnitario as total'),DB::raw('(i.precioUnitario - i.cuenta) as saldo'),'i.cuenta',DB::raw('DATE_FORMAT(i.fecha_inicio, "%d-%b-%Y") as fecha_inicio'),DB::raw('DATE_FORMAT(i.fecha_entrega, "%d-%b-%Y") as fecha_entrega'),'i.detalle')
				->where('i.id_orden_trabajo','LIKE',$id)->first();
		$pdf = \PDF::loadView('ordenes.vista',array('orden'=>$orden));
		$nombre='OT_'.$id.'.pdf';
    	return $pdf->stream($nombre);
	 }

   
}
