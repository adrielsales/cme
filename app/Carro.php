<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carro extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'tipo', 'descricao', 'documento', 'alvara_SEMOB', 'registro_SEMOB', 'ativo', 'membro_id'
	];

	public function membro()
	{
		return $this->belongsTo('App\Membro', 'membro_id');
	}

	public function imagens()
	{
		return $this->hasMany('App\Image');
	}
}
