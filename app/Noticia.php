<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'data_de_cadastro', 'data_de_expiracao_destaque', 'titulo', 'descricao', 'texto', 'capa', 'destaque', 'ativo'
	];
}
