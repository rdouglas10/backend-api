<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Usuarios extends Model
{
	use SoftDeletes;

	protected $table = 'usuarios';

	protected $fillable = ['nome', 'senha'];


	public function corretoras()
    {
        return $this->hasOne('App\Models\Corretoras', 'foreign_key', 'id');
    }

}