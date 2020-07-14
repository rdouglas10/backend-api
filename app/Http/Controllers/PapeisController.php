<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Papeis;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PapeisController extends Controller
{
	private $model;

	public function __construct(Papeis $papeis, User $usuarios)
	{
		$this->middleware('auth');
		$this->model 		= $papeis;
		$this->modelUsuario = $usuarios;
	}

	public function getAll()
	{
		$papeis = $this->model->all();
		return response()->json($papeis);
	}

	public function get($id)
	{
		$papel = $this->model->find($id);
		return response()->json($papel);
	}

	public function store(Request $request)
	{
		
		if ($this->modelUsuario->find($request['usuario_id']))
		{
			$this->model['sigla'] = $request['sigla'];
			$this->model['descricao'] = $request['descricao'];
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
			if ($papel = $this->model->find($request['id']))
			{
				$papel['sigla'] 	 = $request['sigla'];
				$papel['descricao']  = $request['descricao'];
				$papel['usuario_id'] = $request['usuario_id'];
				$papel->save();
				return response()->json($papel);
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
		$papel = $this->model->find($id)->delete();
		return response()->json(null); 
	}

	public function softdelete($id, Request $request)
	{
		$papel = $this->model->find($id)->delete();
		return response()->json(array("messagem"=>"Papel deletado com sucesso!"));
	}


}


 ?>