<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItensVendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itens_vendas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('venda_id')                     ->unsigned();
            
            $table->string('parceiro_nome',100);
            $table->string('produto_nome',100);
            $table->string('unidade',10);
            $table->integer('quantidade');
 

            $table->float('valor_compra', 6, 3);
            $table->float('valor_venda', 6, 3);

            
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('itens_vendas', function($table){
            $table->foreign('venda_id')->references('id')->on('vendas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itens_vendas');
    }
}
