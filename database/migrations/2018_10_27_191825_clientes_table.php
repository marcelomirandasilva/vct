<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nome',100);
            $table->string('telefone1',13)                  ->nullable();
            $table->string('telefone2',13)                  ->nullable();
            $table->string('telefone3',13)                  ->nullable();
            $table->string('email')                         ->nullable();
            $table->date('nascimento')                      ->nullable();

            $table->string('pais',100)                      ->nullable();
            $table->string('cpf',15)                        ->nullable();
            $table->enum('uf',['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO'])  ->nullable();

            $table->char('cep',10)                          ->nullable();
            $table->string('municipio',30)                  ->nullable();
            $table->string('bairro',20)                     ->nullable();
            $table->string('logradouro',100)                ->nullable();
            $table->string('numero',20)                     ->nullable();
            $table->string('complemento',100)               ->nullable();
            $table->string('referencia',255)                ->nullable();


            $table->string('conta',20)                      ->nullable();
            $table->string('agencia',10)                    ->nullable();
            $table->integer('banco_id')                     ->unsigned()->nullable();
            
            $table->text('obs')                             ->nullable();
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('clientes', function($table){
            $table->foreign('banco_id')->references('id')->on('bancos')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('clientes');
    }
}
