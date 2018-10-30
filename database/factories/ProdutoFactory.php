<?php

use App\helpers\geral;

use Faker\Generator as Faker;
use App\Models\Parceiro;

$factory->define(App\Models\Produto::class, function (Faker $faker) {

    $faker = (new \Faker\Factory())::create('pt_BR');

    $v_parceiro = Parceiro::all()->random()->id;

    $vetor      = pegaValorEnum('produtos','unidade');
    $v_unidade  = $vetor[array_rand($vetor,1)];

    $v_gramas       = null;
    $v_mililitros   = null;
    $v_unidades     = null;
    $v_quantidade   = 1;

    echo $v_unidade;

    switch ($v_unidade) {
        
        case 'kg':
            $v_quantidade = $faker->numberBetween($min = 1, $max = 5);
            $v_gramas = $v_quantidade*1000;
            break;

        case 'g':
            $v_quantidade = $faker->numberBetween($min = 50, $max = 950);
            $v_gramas = $v_quantidade;
            break;

        case 'l':
            $v_quantidade = $faker->numberBetween($min = 1, $max = 5);
            $v_mililitros = $v_quantidade*1000;
            break;

        case 'ml':
            $v_quantidade = $faker->numberBetween($min = 50, $max = 5);
            $v_mililitros = $v_quantidade*1000;
            break;

        case 'un':
            $v_quantidade = 1;
            $v_unidades = $v_quantidade;
            break;

        case 'cx':
            $v_quantidade = 1;
            $v_unidades = $v_quantidade;
            break;

        case 'dz':
            $v_quantidade = 1;
            $v_unidades = $v_quantidade*12;
            break;

        case '1/2 dz':
            $v_quantidade = 1;
            $v_unidades = $v_quantidade*6;
            break;
        
        case 'maço':
            $v_quantidade = 1;
            $v_unidades = $v_quantidade*6;
            break;
        
    }


    return [
        'nome'          => $faker->lastName,   
        'parceiro_id'   => $v_parceiro,
        'unidade'       => $v_unidade,
        'quantidade'    => $v_quantidade,

        'gramas'        => $v_gramas,
        'mililitros'    => $v_mililitros,
        'unidades'      => $v_unidades,

        'preco_compra'  => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50), 
        'preco_venda'   => $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 50),

    ];
});
