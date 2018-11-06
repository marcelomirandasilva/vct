<?php

use App\helpers\geral;

use Faker\Generator as Faker;
use App\Models\Cliente;
use App\Models\Banco;

$factory->define(App\Models\Venda::class, function (Faker $faker) {

    $faker = (new \Faker\Factory())::create('pt_BR');

    $v_cliente = Cliente::all()->random();

    $v_hh_inicio_entrega    = $faker->time($format = 'H:i:s', $max = '17:00:00');
    $v_hh_termino_entrega   = $faker->time($format = 'H:i:s', $max = '20:00:00');

    $vetor = pegaValorEnum('vendas','tp_pagamento');
    $v_tp_pagamento = $vetor[array_rand($vetor,1)];

    $vetor = pegaValorEnum('vendas','transporte');
    $v_transporte = $vetor[array_rand($vetor,1)];
    
    return [
        'cliente_id'        =>  $v_cliente->id,

        'valor_total_venda' =>  $faker->randomFloat($nbMaxDecimals = 2, $min = 10, $max = 300),
        'dt_entrega'        =>  $faker->dateTimeBetween($startDate = 'now', $endDate = '+10 days', $timezone = null),
        'hh_inicio_entrega' =>  $v_hh_inicio_entrega,
        'hh_termino_entrega'=>  $v_hh_termino_entrega,
        'contato'           =>  explode(' ',trim($v_cliente->nome))[0],
        'tp_pagamento'      =>  $v_tp_pagamento,
        'pg_recebido'       =>  $faker->boolean,
        'transporte'        =>  $v_transporte,

        'entrega_realizada' =>  $faker->boolean,

        'pais'          => 'Brasil',
        'uf'            => $v_cliente->uf,
        'municipio'     => $v_cliente->municipio,
        'bairro'        => $v_cliente->bairro,
        'logradouro'    => $v_cliente->logradouro,
        'numero'        => $v_cliente->numero,
        'complemento'   => $v_cliente->complemento,
        'cep'           => $v_cliente->cep,
        'obs'           => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),      



        'cpf'           => $v_cliente->cpf,
        'conta'         => $v_cliente->conta,
        'agencia'       => $v_cliente->agencia,
        'banco_id'      => $v_cliente->banco_id,


    ];
});
