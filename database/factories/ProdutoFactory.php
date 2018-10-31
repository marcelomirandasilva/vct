<?php

use App\helpers\geral;

use Faker\Generator as Faker;
use App\Models\Parceiro;

$factory->define(App\Models\Produto::class, function (Faker $faker) {

    $faker = (new \Faker\Factory())::create('pt_BR');

    $v_parceiro = Parceiro::all()->random()->id;

    $v_valor_compra = $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 10);
    $v_valor_venda  = $v_valor_compra + $faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 3);

    $vetor      = pegaValorEnum('produtos','unidade');
    $v_unidade  = $vetor[array_rand($vetor,1)];

    $v_valor_unidade       = null;

    $v_quantidade   = 1;
    $divisor = 1;

    echo $v_unidade;

    switch ($v_unidade) {
        
        case 'kg':
            $v_quantidade = $faker->numberBetween($min = 1, $max = 3);
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade ) / 1000;
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade ) / 1000;

            break;

        case 'g':
            $v_quantidade = $faker->numberBetween($min = 50, $max = 950);
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade );
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade );

            break;

        case 'l':
            $v_quantidade = $faker->numberBetween($min = 1, $max = 3);
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade ) / 1000;
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade ) / 1000;
            break;

        case 'ml':
            $v_quantidade = $faker->numberBetween($min = 50, $max = 3);
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade );
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade );
            break;

        case 'un':
            $v_quantidade = 1;
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade );
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade );
            break;

        case 'cx':
            $v_quantidade = 1;
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade );
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade );
            break;

        case 'dz':
            $v_quantidade = 1;
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade )/12;
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade )/12;
            break;

        case '1/2 dz':
            $v_quantidade = 1;
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade )/6;
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade )/6;
            break;
        
        case 'maço':
            $v_quantidade = 1;
            $v_valor_compra_unidade = ($v_valor_compra / $v_quantidade );
            $v_valor_venda_unidade  = ($v_valor_venda / $v_quantidade );
            break;
        
    }

   



    return [
        'nome'                  => $faker->lastName,   
        'parceiro_id'           => $v_parceiro,
        'unidade'               => $v_unidade,
        'quantidade'            => $v_quantidade,

        'valor_compra'          => $v_valor_compra,
        'valor_venda'           => $v_valor_venda,
        'valor_compra_unidade'  => $v_valor_compra_unidade,
        'valor_venda_unidade'   => $v_valor_venda_unidade,

    ];
});
