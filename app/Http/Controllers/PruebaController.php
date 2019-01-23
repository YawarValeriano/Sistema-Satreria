<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use SastRicAtelier\Orden;
use DB;

class PruebaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $pendientes=DB::table('orden_trabajo as i')
            ->join('cliente as p','i.cliente_ci','=','p.CI')
            ->select('i.id_orden_trabajo','i.cantidad',DB::raw('DATE_FORMAT(i.fecha_prueba, "%d-%m-%Y") as fecha_prueba'),'i.flag_estado','i.detalle')
            ->whereNotNull('i.fecha_prueba')
            ->where('i.flag_estado','<>',2)
            ->where('i.flag_estado','<>',3)
            ->orderBy('i.fecha_prueba','asc')
            ->groupBy('i.id_orden_trabajo','i.cantidad','i.fecha_prueba','i.flag_estado','i.detalle')
            ->paginate(7);
        return view('pruebas.index',["pendientes"=>$pendientes]);
    }
//    public function update(Request $request){
//        $orden=Orden::findOrFail($request->id_orden_trabajo);
//        $val=$request->flag_estado;
//        $orden->flag_estado=($val);
//        $orden->update();
//        return Redirect::to('pendiente');
//    }
}
