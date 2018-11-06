<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Venda extends Model implements AuditableContract
{
   use \OwenIt\Auditing\Auditable, SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable =[
        'nome',

        'cliente_id',

        'valor_total_venda',
        'dt_entrega',
        'hh_inicio_entrega',
        'hh_termino_entrega',
        'contato',
        'tp_pagamento',
        'pg_recebido',
        'transporte',

        'banco_id',
        'conta',
        'agencia',
        
        'pais',
        'uf',
        'municipio',
        'bairro',
        'logradouro',
        'numero',
        'complemento',
        'cep',
        'obs'
    ];

    public function cliente()
    {
    	return $this->belongsTo('App\Models\Cliente','cliente_id');
    }  
}
