<?php

use App\helpers\geral;

use Faker\Generator as Faker;

$factory->define(App\Models\Parceiro::class, function (Faker $faker) {

    $faker = (new \Faker\Factory())::create('pt_BR');
       
    return [
        'nome'          => $faker->company,   
        'telefone1'     => $faker->regexify('[0-9]{2}[0-9]{4,5}[0-9]{4}'),   
        'telefone2'     => $faker->regexify('[0-9]{2}[0-9]{3}[0-9]{4}'),   
        'telefone3'     => $faker->regexify('[0-9]{2}[0-9]{4}[0-9]{4}'),   
        'email'         => $faker->unique()->safeEmail,
        'pais'          => 'Brasil',
        'uf'            => $faker->stateAbbr,
        'municipio'     => $faker->city,
        'bairro'        => 'Centro',
        'logradouro'    => $faker->streetName,
        'numero'        => $faker->buildingNumber,
        'complemento'   => $faker->text($maxNbChars = 50),      
        'cep'           => $faker->postcode,      


    ];
});
