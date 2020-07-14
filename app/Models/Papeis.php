<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Papeis extends Model
{
	use SoftDeletes;

	protected $table = 'papeis';

	protected $fillable = ['sigla', 'descricao', 'usuario_id'];


	public function users()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }
	
}