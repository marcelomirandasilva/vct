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
        'razao_social',
        'cnpj',
        'numero_contato',
        'nome_contato',
        'endereco',
    ];

    public function veiculos()
    {
        return $this->hasMany('App\Models\Veiculos');
    }
}
