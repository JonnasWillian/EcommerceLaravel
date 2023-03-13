<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->double('preco', 10, 2);
            $table->double('quantidade');

            $table->unsignedBigInteger('id_user');// Interligação com uma tabela estrangeira
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');// Cria uma ligação com a tabela relacionada e caso a coluna relacionada for apagada, esse dado também será
        
            $table->unsignedBigInteger('id_produto');
            $table->foreign('id_produto')->references('id')->on('produtos')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->string('ids_produtos')->nullable(); //Aceita campo nulo
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
