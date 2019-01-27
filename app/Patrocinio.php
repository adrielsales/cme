<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patrocinio extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'nome', 'logomarca', 'ativo', 'membro_id'
	];

	public function membro()
	{
		return $this->belongsTo('App\Membro', 'membro_id');
	}
}
