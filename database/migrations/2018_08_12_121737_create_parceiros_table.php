<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParceirosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parceiros', function (Blueprint $table) {
            $table->increments('id');


            $table->string('nome',100);
            $table->string('telefone1',11)                  ->nullable();
            $table->string('telefone2',11)                  ->nullable();
            $table->string('telefone3',11)                  ->nullable();
            $table->string('email')                         ->nullable();

            $table->string('pais',100)                      ->nullable();
            
            $table->enum('uf',['AC','AL','AM','AP','BA','CE','DF','ES','GO','MA','MG','MS','MT','PA','PB','PE','PI','PR','RJ','RN','RO','RR','RS','SC','SE','SP','TO'])   ->nullable();


            $table->string('municipio',30)                  ->nullable();
            $table->string('bairro',20)                     ->nullable();
            $table->string('logradouro',100)                ->nullable();
            $table->unsignedMediumInteger('numero')         ->nullable();
            $table->string('complemento',100)               ->nullable();
            $table->char('cep',10)                          ->nullable();


            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locadoras');
    }
}
