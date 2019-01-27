<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acompanhante extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'nome', 'alvara_SEMOB', 'ativo', 'membro_id'
	];

	public function membro()
	{
		return $this->belongsTo('App\Membro', 'membro_id');
	}
}
