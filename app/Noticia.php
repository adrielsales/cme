<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $timestamps = true;

	protected $fillable = [
		'data_para_publicar_destaque', 'data_de_expiracao_destaque', 'titulo', 'sub_titulo', 'texto', 'capa', 'destaque', 'ativo'
	];
}
