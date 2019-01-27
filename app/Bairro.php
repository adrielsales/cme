<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bairro extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'nome', 'cidade'
	];

	public function membros()
	{
	    return $this->belongsToMany('App\Membro')->withTimestamps();
	}
}
