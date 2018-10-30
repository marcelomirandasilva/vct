<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Cliente extends Model implements AuditableContract
{
   use \OwenIt\Auditing\Auditable, SoftDeletes;


    protected $dates = ['deleted_at'];

    protected $fillable =[
        'nome',
        'telefone1',
        'telefone2',
        'telefone3',
        'nascimento',
        
        'email',
        'cpf',
        
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

    public function banco()
    {
    	return $this->belongsTo('App\Models\Banco','banco_id');
    }  
}
