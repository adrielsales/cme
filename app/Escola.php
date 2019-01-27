<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escola extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'nome', 'logomarca', 'endereco', 'ativo'
	];

	public function membros()
	{
	    return $this->belongsToMany('App\Membro')->withTimestamps();
	}	
}
