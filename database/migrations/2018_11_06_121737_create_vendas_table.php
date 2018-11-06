<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')                  ->unsigned();
           
            $table->float('valor_total_venda', 6, 3);
            $table->date('dt_entrega')                      ->nullable();
            $table->time('hh_inicio_entrega')               ->nullable();
            $table->time('hh_termino_entrega')              ->nullable();
            $table->boolean('entrega_realizada')            ->default(0);

            $table->string('contato',100)                   ->nullable();

            $table->enum('tp_pagamento',['CARTÃO','DEPÓSITO','TRANSFERÊNCIA','DINHEIRO'])  ->nullable();
            $table->boolean('pg_recebido')                   ->default(0);

            $table->enum('transporte',['CT','ENTREGADOR','CLIENTE'])  ->default('ENTREGADOR');


            $table->string('pais',100)                      ->nullable();
            $table->string('cpf',15)                        ->nullable();
            $table->enum('uf',['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO'])  ->nullable();

            $table->string('municipio',30)                  ->nullable();
            $table->string('bairro',20)                     ->nullable();
            $table->string('logradouro',100)                ->nullable();
            $table->string('numero',20)                     ->nullable();
            $table->string('complemento',100)               ->nullable();
            $table->char('cep',10)                          ->nullable();


            $table->string('conta',20)                      ->nullable();
            $table->string('agencia',10)                    ->nullable();
            $table->integer('banco_id')                     ->unsigned()->nullable();
            
            $table->text('obs')                             ->nullable();

            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('vendas', function($table){
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vendas');
    }
}
