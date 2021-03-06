<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use SastRicAtelier\Cliente;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\QueryException;
use SastRicAtelier\Http\Requests\ClienteFormRequest;
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
				->select('a.CI','a.nombre','a.apellidos','a.telefono','a.zona','a.email')
				->where('a.nombre','LIKE','%'.$query.'%')
                ->orwhere('a.telefono','LIKE','%'.$query.'%')
                ->orwhere('a.CI','LIKE','%'.$query.'%')
				->orderBy('a.nombre','asc')
				->paginate(5);
			return view("clientes.index",["cliente"=>$cliente,"searchText"=>$query]);
		}
	}
	public function create()
    {
        return view("clientes.create");
    }
    public function store(ClienteFormRequest $request)
    {
        try { 
            $cliente=new Cliente;
            $cliente->CI=$request->get('CI');
            $cliente->nombre=$request->get('nombre');
            $cliente->apellidos=$request->get('apellidos');
            $cliente->telefono=$request->get('telefono');
            $cliente->zona=$request->get('zona');
            $cliente->email=$request->get('email');
            $cliente->save();
            return Redirect::to('orden/create');
        } catch(QueryException $ex){ 
            return Redirect::to('orden/create')->with('alert', $ex);
        }
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
        return Redirect::to('cliente');
    }
    public function destroy($id)
    {
        $cliente=Cliente::findOrFail($id);
        $cliente->delete();
        return Redirect::to('cliente');
    }
}
