<?php

use App\helpers\geral;

use Faker\Generator as Faker;

$factory->define(App\Models\Parceiro::class, function (Faker $faker) {

    $faker = (new \Faker\Factory())::create('pt_BR');

    $vetor = pegaValorEnum('parceiros','banco');
	$v_banco = $vetor[array_rand($vetor,1)];
       
    $vetor = pegaValorEnum('parceiros','tipo_cadastro');
    $v_tipo_cadastro = $vetor[array_rand($vetor,1)];

    if( $v_tipo_cadastro == 'CNPJ'){
        $v_cadastro =$faker->cpf(false);
    }else{
        $v_cadastro =$faker->cnpj(false);
    }
    
    return [
        'nome'          => $faker->company,   
        'telefone1'     => $faker->regexify('[0-9]{2}[0-9]{4,5}[0-9]{4}'),   
        'telefone2'     => $faker->regexify('[0-9]{2}[0-9]{3}[0-9]{4}'),   
        'telefone3'     => $faker->regexify('[0-9]{2}[0-9]{4}[0-9]{4}'),   
        'email'         => $faker->unique()->safeEmail,
        'tipo_cadastro' => $v_tipo_cadastro,
        'cadastro'      => $v_cadastro,
        'site'          => $faker->url,
        'facebook'      => $faker->url,
        'instagram'     => $faker->url,
        'conta'         => $faker->regexify('[0-9]{7}-[0-9]{1}'),   
        'agencia'       => $faker->regexify('[0-9]{3}'),   
        'banco'         => $v_banco,

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
