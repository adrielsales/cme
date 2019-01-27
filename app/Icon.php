<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Icon extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'nome', 'icon'
	];

	public function contatos()
	{
		return $this->hasMany('App\Contato');
	}
}
