<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Produto extends Model implements AuditableContract
{
   use \OwenIt\Auditing\Auditable, SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable =[

        'nome',
        'parceiro_id',
        'unidade',
        'quantidade',
        'gramas',
        'mililitros',
        'unidades',
        'preco_compra',
        'preco_venda',
    ];

    public function parceiro()
    {
    	return $this->belongsTo('App\Models\Parceiro','parceiro_id');
    }  
}
