<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operacoes;
use App\Models\Papeis;
use App\Models\Corretoras;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OperacoesController extends Controller
{
	private $model;

	public function __construct(Operacoes $operacoes, Corretoras $corretoras, Papeis $papeis, User $usuarios)
	{
		$this->middleware('auth');
		$this->model 		  = $operacoes;
		$this->modelUsuario   = $usuarios;
		$this->modelCorretora = $corretoras;
		$this->modelPapel     = $papeis;
	}

	public function getAll()
	{
		$operacoes = $this->model->all();
		return response()->json($operacoes);
	}

	public function get($id)
	{
		$operacao = $this->model->find($id);
		return response()->json($operacao);
	}

	public function store(Request $request)
	{
		if ($this->modelUsuario->find($request['usuario_id']) && $this->modelCorretora->find($request['corretora_id']) && $this->modelPapel->find($request['papel_id']))
		{
			$this->model['data'] 		  = $request['data'];
			$this->model['tipo_operacao'] = $request['tipo_operacao'];
			$this->model['quantidade']    = $request['quantidade'];
			$this->model['valor']    	  = $request['valor'];
			$this->model['usuario_id'] 	  = $request['usuario_id'];
			$this->model['corretora_id']  = $request['corretora_id'];
			$this->model['papel_id']      = $request['papel_id'];
			$this->model->save();
			return response()->json($this->model->save());
		}
		else
		{	
			return response()->json(array("messagem"=>"O usuário/corretora/papel não existe(m)!"));
		}
		
	}

	public function update($id, Request $request)
	{
		if ($this->modelUsuario->find($request['usuario_id']) && $this->modelCorretora->find($request['corretora_id']) && $his->modelPapel->find($request['papel_id']))
		{
			if ($operacao = $this->model->find($request['id']))
			{
				$operacao['data'] 		   = $request['data'];
				$operacao['tipo_operacao'] = $request['tipo_operacao'];
				$operacao['quantidade']    = $request['quantidade'];
				$operacao['valor']    	   = $request['valor'];
				$operacao['usuario_id']    = $request['usuario_id'];
				$operacao['corretora_id']  = $request['corretora_id'];
				$operacao['papel_id']      = $request['papel_id'];
				$operacao->save();
				return response()->json($operacao);
			}
			else
			{	
				return response()->json(array("messagem"=>"A operação não existe!"));
			}
		}
		else
		{
			return response()->json(array("messagem"=>"O usuário/corretora/papel não existe(m)!"));
		}
	}

	public function destroy($id, Request $request)
	{
		$operacao = $this->model->find($id)->delete();
		return response()->json(null); 
	}

	public function softdelete($id, Request $request)
	{
		$operacao = $this->model->find($id)->delete();
		return response()->json(array("messagem"=>"Operação deletada com sucesso!"));
	}


}


 ?>