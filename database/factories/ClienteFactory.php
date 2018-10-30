<?php

use App\helpers\geral;

use Faker\Generator as Faker;
use App\Models\Banco;

$factory->define(App\Models\Cliente::class, function (Faker $faker) {

    $faker = (new \Faker\Factory())::create('pt_BR');

	$v_banco = Banco::all()->random()->id;
       
    $v_nascimento = $faker->dateTimeBetween($startDate = '-60 years', $endDate = '-15 years', $timezone = null);
    $v_nascimento = $v_nascimento->format('Y-m-d');

    echo $v_nascimento;
    echo '\r\n';
    
    return [
        'nome'          => $faker->company,   
        'telefone1'     => $faker->regexify('[0-9]{0,2}[0-9]{2}[0-9]{4,5}[0-9]{4}'),   
        'telefone2'     => $faker->regexify('[0-9]{0,2}[0-9]{2}[0-9]{3}[0-9]{4}'),   
        'telefone3'     => $faker->regexify('[0-9]{0,2}[0-9]{2}[0-9]{4}[0-9]{4}'),   
        'email'         => $faker->unique()->safeEmail,
        'cpf'           => $faker->cpf(false),
        'nascimento'    => $v_nascimento,
        'conta'         => $faker->regexify('[0-9]{7}-[0-9]{1}'),   
        'agencia'       => $faker->regexify('[0-9]{3}'),   
        'banco_id'      => $v_banco,

        'pais'          => 'Brasil',
        'uf'            => $faker->stateAbbr,
        'municipio'     => $faker->city,
        'bairro'        => 'Centro',
        'logradouro'    => $faker->streetName,
        'numero'        => $faker->buildingNumber,
        'complemento'   => $faker->text($maxNbChars = 50),      
        'cep'           => $faker->postcode,      

        'obs'           => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),      

    ];
});
