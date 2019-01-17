<?php

namespace SastRicAtelier\Http\Controllers;

use Illuminate\Http\Request;

use SastRicAtelier\User;
use Illuminate\Support\Facades\Redirect;
use SastRicAtelier\Http\Requests\UsuarioFormRequest;
use DB;
use Carbon\Carbon;

class UsuarioController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}
	public function index(Request $request)
	{
		if($request)
		{
			DB::statement("SET lc_time_names = 'es_ES'");
			$query=trim($request->get('searchText'));
			$usuarios=DB::table('users')
				->select('id','name','last_name','email',DB::raw('DATE_FORMAT(birthday, "%d-%b-%Y") as birthday'))
				->where('name','LIKE','%'.$query.'%')
				->orwhere('last_name','LIKE','%'.$query.'%')
           		->orderBy('id','asc')
				->paginate(7);
			return view("seguridad.index",["usuarios"=>$usuarios,"searchText"=>$query]);
		}
	}
	public function create()
    {
       return view("seguridad.create");
    }
    public function store(UsuarioFormRequest $request)
    {
        $usuario=new User;
        $usuario->name=$request->get('name');
        $usuario->last_name=$request->get('last_name');
        $formato_fecha=new Carbon($request->get('birthday'));
        $usuario->birthday=$formato_fecha->format('Y-m-d');
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->save();
        return Redirect::to('seguridad');
    }
    public function edit($id)
    {
        return view("seguridad.edit",["usuario"=>User::findOrFail($id)]);
    }
    public function update(UsuarioFormRequest $request,$id)
    {
        $usuario=User::findOrFail($id);
        $usuario->email=$request->get('email');
        $usuario->password=bcrypt($request->get('password'));
        $usuario->update();
        return Redirect::to('seguridad');
    }
    public function destroy($id)
    {
        $usuario=DB::table('users')->where('id','=',$id)->delete();
        return Redirect::to('seguridad');
    }
}
