<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corretoras;
use App\Models\User;
// use Illuminate\Support\Facades\Auth;

class CorretorasController extends Controller
{
	private $model;

	public function __construct(Corretoras $corretoras, User $usuarios)
	{
		// $this->middleware('auth');
		$this->model 		= $corretoras;
		$this->modelUsuario = $usuarios;
	}

	public function getAll()
	{
		$corretoras = $this->model->all();
		return response()->json($corretoras);
	}

	public function get($id)
	{
		$corretora = $this->model->find($id);
		return response()->json($corretora);
	}

	public function store(Request $request)
	{
		// $corretora = $this->model->create($request->all());
		// return response()->json($request->all());
		
		if ($this->modelUsuario->find($request['usuario_id']))
		{
			$this->model['nome'] = $request['nome'];
			$this->model['usuario_id'] = $request['usuario_id'];
			$this->model->save();
			return response()->json($this->model->save());
		}
		else
		{	
			return response()->json(array("messagem"=>"O usuário não existe!"));
		}
		
	}

	public function update($id, Request $request)
	{
		if ($this->modelUsuario->find($request['usuario_id']))
		{
			if ($corretora = $this->model->find($request['id']))
			{
				$corretora['nome'] 	   = $request['nome'];
				$corretora['usuario_id'] = $request['usuario_id'];
				$corretora->save();
				return response()->json($corretora);
			}
			else
			{	
				return response()->json(array("messagem"=>"A corretora não existe!"));
			}
		}
		else
		{
			return response()->json(array("messagem"=>"O usuário não existe!"));
		}
	}

	public function destroy($id, Request $request)
	{
		$corretora = $this->model->find($id)->delete();
		return response()->json(null); 
	}

	public function softdelete($id, Request $request)
	{
		$corretora = $this->model->find($id)->delete();
		return response()->json(array("messagem"=>"Corretora deletada com sucesso!")); 
	}


}


 ?>