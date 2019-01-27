<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
	public $timestamps = true;

	protected $fillable = [
		'tipo', 'contato', 'publico', 'ativo', 'icon_id', 'membro_id'
	];

	public function icon()
    {
        return $this->belongsTo('App\Icon');
    }

	public function membro()
    {
        return $this->belongsTo('App\Membro');
    }
}
