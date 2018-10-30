<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');


            $table->string('nome',100);
            $table->integer('parceiro_id')                  ->unsigned();

            $table->enum('unidade',['g','kg','ml','l','un','maço','cx','dz','1/2 dz']);
            $table->float('quantidade', 5, 2);

            $table->integer('gramas')           ->nullable();
            $table->integer('mililitros')       ->nullable();
            $table->integer('unidades')         ->nullable();

            $table->float('preco_compra', 5, 2);
            $table->float('preco_venda', 5, 2);
            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('produtos', function($table){
            $table->foreign('parceiro_id')->references('id')->on('parceiros')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
