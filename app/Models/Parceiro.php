<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class Parceiro extends Model implements AuditableContract
{
   use \OwenIt\Auditing\Auditable, SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $table = "parceiros";

    protected $fillable =[
        'nome',
        'telefone1',
        'telefone2',
        'telefone3',
        'email',
        
        'tipo_cadastro',
        'cadastro',
        'site',
        'facebook',
        'instagram',
        'banco',
        'conta',
        'agencia',
        
        'pais',
        'uf',
        'municipio',
        'bairro',
        'logradouro',
        'complemento',
        'cep',

];

    public function veiculos()
    {
        return $this->hasMany('App\Models\Veiculos');
    }
}
