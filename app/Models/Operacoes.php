<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Operacoes extends Model
{
	use SoftDeletes;

	protected $table = 'operacoes';

	protected $fillable = ['data_operacao', 'tipo_operacao', 'quantidade', 'valor', 'usuario_id', 'corretora_id', 'papel_id'];


	public function users()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

}