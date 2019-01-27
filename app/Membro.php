<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Membro extends Model
{
    public $timestamps = true;
	protected $fillable = [
		'nome', 'endereco', 'experiencia', 'url_video', 'foto', 'documento', 'ativo'
	];

	public function acompanhantes()
	{
		return $this->hasMany('App\Acompanhante');
	}

	public function carros()
	{
		return $this->hasMany('App\Carro');
	}	

	public function patrocinios()
	{
		return $this->hasMany('App\Patrocinio');
	}

	public function contatos()
	{
		return $this->hasMany('App\Contato');
	}

	public function bairros()
	{
	    return $this->belongsToMany('App\Bairro')->withTimestamps();
	}

	public function escolas()
	{
	    return $this->belongsToMany('App\Escola')->withTimestamps();
	}
}

