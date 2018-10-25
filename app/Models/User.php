<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;


use OwenIt\Auditing\Contracts\Auditable as AuditableContract;


class User extends Authenticatable implements AuditableContract
{
    use Notifiable;
    use \OwenIt\Auditing\Auditable;

    //protected $connection = 'mysql_sisseg'; //altera para conectar no outro banco
    //protected $table = "funcionarios";      //substitui o nome da tabela que tem as credenciais

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
    ];

    
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
