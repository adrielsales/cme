<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
	public $timestamps = true;

	protected $fillable = [
		'tipo', 'imagem', 'titulo', 'descricao', 'carro_id'
	];

	public function carro()
    {
        return $this->belongsTo('App\Carro');
    }
}
