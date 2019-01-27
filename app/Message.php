<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
	public $timestamps = true;

	protected $fillable = [
		'remetente', 'email', 'fone', 'mensagem', 'publicar', 'ativo'
	];

	// public function scopeAtivo($query)
	// {
	// 	return $query->where('ativo', '=', 1);
	// }

	// public function scopePublicar($query)
	// {
	// 	return $query->where('publicar', '=', 1);
	// }
}
