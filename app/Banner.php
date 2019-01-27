<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
	public $timestamps = true;

	protected $fillable = [
		'titulo', 'sub_titulo', 'imagem', 'tipo', 'ativo', 'posicao'
	];
}
