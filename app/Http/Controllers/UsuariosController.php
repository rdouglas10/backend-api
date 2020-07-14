<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
	private $model;

	public function __construct(User $usuarios)
	{
		// $this->middleware('auth');
		$this->model = $usuarios;
	}

	public function getAll()
	{
		$usuarios = $this->model->all();
		return response()->json($usuarios);
	}

	public function get($id)
	{
		$usuario = $this->model->find($id);
		return response()->json($usuario);
	}

	public function store(Request $request)
	{
		$usuario = $this->model->create($request->all());
		return response()->json($usuario);
	}

	public function update($id, Request $request)
	{
		$usuario = $this->model->find($id)->update($request->all());
		return response()->json($usuario);
	}

	public function destroy($id, Request $request)
	{
		$usuario = $this->model->find($id)->delete();
		return response()->json(null); 
	}

	public function softdelete($id, Request $request)
	{
		$usuario = $this->model->find($id)->delete();
		return response()->json(null); 
	}


}


 ?>