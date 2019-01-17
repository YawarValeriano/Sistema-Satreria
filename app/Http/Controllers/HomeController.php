<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hoy=Carbon::today();
        //GRÁFICOS
        //datos para primer grafico
        $graf1=DB::table('orden_trabajo as a')
            ->select('a.flag_tipo',DB::raw('count(a.flag_tipo) as total'))
            ->groupBy('a.flag_tipo')->get();
        //datos para segundo gráfico
        $graf2=DB::table('orden_trabajo as a')
            ->select(DB::raw('MONTH(a.fecha_inicio) as mes'),'a.flag_tipo', DB::raw('count(a.flag_tipo) as total'))
            ->where(DB::raw('YEAR(a.fecha_inicio)'),'=',$hoy->year)
            ->groupBy(DB::raw('MONTH(a.fecha_inicio)'),'a.flag_tipo')
            ->orderBy(DB::raw('MONTH(a.fecha_inicio)'))->get();
        //datos para el tercer gráfico
        $graf3=DB::table('orden_trabajo as a')
            ->select(DB::raw('MONTH(a.fecha_inicio) as mes'),'a.flag_tipo', DB::raw('SUM(a.precioUnitario) as total'))
            ->where(DB::raw('YEAR(a.fecha_inicio)'),'=',$hoy->year)
            ->groupBy(DB::raw('MONTH(a.fecha_inicio)'),'a.flag_tipo')
            ->orderBy(DB::raw('MONTH(a.fecha_inicio)'))->get();
        //datos para el cuarto grafico
        $graf4=DB::table('orden_trabajo as a')
            ->join('users as b', 'b.id','=','a.sastre_id')
            ->select(DB::raw('CONCAT(b.name," ", b.last_name) as usuario'), DB::raw('count(a.id_orden_trabajo) as total'))
            ->groupBy('usuario')->get();
        
        //INDICADORES
        $in1=DB::table('orden_trabajo as a')
            ->select(DB::raw('count(a.flag_estado) as total'))
            ->where('a.flag_estado','=',0)
            ->orwhere('a.flag_estado','=',1)->first();
        $in3=DB::table('cliente as a')
            ->select(DB::raw('count(a.CI) as clientes'))->first();
        $in4=DB::table('orden_trabajo as a')
            ->select(DB::raw('count(a.flag_estado) as total'))
            ->where('a.flag_estado','=',3)
            ->where(DB::raw('YEAR(a.fecha_entrega)'),'LIKE',$hoy->year)
            ->where(DB::raw('MONTH(a.fecha_entrega)'),'LIKE',$hoy->month)->first();
        if ($hoy->month==1) {
            $in4_1=DB::table('orden_trabajo as a')
                ->select(DB::raw('count(a.flag_estado) as total'))
                ->where('a.flag_estado','=',3)
                ->where(DB::raw('YEAR(a.fecha_entrega)'),'LIKE',($hoy->year - 1))
                ->where(DB::raw('MONTH(a.fecha_entrega)'),'LIKE',12)->first();
        }
        else{
            $in4_1=DB::table('orden_trabajo as a')
                ->select(DB::raw('count(a.flag_estado) as total'))
                ->where('a.flag_estado','=',3)
                ->where(DB::raw('YEAR(a.fecha_entrega)'),'LIKE',$hoy->year)
                ->where(DB::raw('MONTH(a.fecha_entrega)'),'LIKE',($hoy->month - 1))->first();
        }
        $in2=DB::table('orden_trabajo as a')
                ->select(DB::raw('DATE_FORMAT(a.fecha_inicio, "%b") as mes'),DB::raw('count(a.fecha_inicio) as total'))
                ->where(DB::raw('YEAR(a.fecha_inicio)'),'LIKE',$hoy->year)
                ->groupBy('mes')
                ->orderBy('total','desc')->first();
        //var_dump($in2);
        return view('home', compact('graf1','graf2','graf3','graf4','in1','in2','in3','in4','in4_1'));
        //tiene que ser por año actual todo 
    }
}
