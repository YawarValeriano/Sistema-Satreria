<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use SastRicAtelier\Cliente;
use Illuminate\Support\Facades\Redirect;
use SastRicAtelier\Http\Request\ClienteFormRequest;
use DB;

class ClienteController extends Controller
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
			$cliente=DB::table('cliente as a')
				->select('a.CI','a.nombre','a.apellidos','a.telefono','a.zona')
				->where('a.nombre','LIKE','%'.$query.'%')
                ->orwhere('a.telefono','LIKE','%'.$query.'%')
				->orderBy('a.CI','asc')
				->paginate(7);
			return view("clientes.index",["cliente"=>$cliente,"searchText"=>$query]);
		}
	}
	public function create()
    {
        return view("clientes.create");
    }
    public function store(ClienteFormRequest $request)
    {
        $cliente=new Cliente;
        $cliente->CI=$request->get('CI');
        $cliente->nombre=$request->get('nombre');
        $cliente->apellidos=$request->get('apellidos');
        $cliente->telefono=$request->get('telefono');
        $cliente->zona=$request->get('zona');
        $cliente->save();
        return Redirect::to('clientes');
    }
    public function show($id)
    {
        return view('clientes.show',['cliente'=>Cliente::findOrFail($id)]);
    }
    public function edit($id)
    {
    	return view('clientes.edit',['cliente'=>Cliente::findOrFail($id)]);
	}
    public function update(ClienteFormRequest $request,$id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->telefono=$request->get('telefono');
        $cliente->zona=$request->get('zona');
        $cliente->update();
        return Redirect::to('clientes');
    }
    public function destroy($id)
    {
        $cliente=Articulo::findOrFail($id);
        $cliente->delete();
        return Redirect::to('clientes');
    }
}
