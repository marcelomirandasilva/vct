<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banco extends Model
{
	protected $fillable =[
		'nome',
		'codigo'
	];

	public function clientes()
	{
		return $this->hasMany('App\Models\Clientes');
	}

	public function parceiros()
	{
		return $this->hasMany('App\Models\Parceiros');
	}

	public function vendas()
	{
		return $this->hasMany('App\Models\Vendas');
	}	
}
