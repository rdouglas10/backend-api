<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

Class Corretoras extends Model
{
	use SoftDeletes;

	protected $table = 'corretoras';

	protected $fillable = ['nome'];


    public function users()
    {
        return $this->belongsTo('App\Models\User', 'id');
    }

}