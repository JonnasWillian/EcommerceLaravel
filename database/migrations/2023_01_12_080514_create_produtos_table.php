<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('produtos', function (Blueprint $table) {

            $table->id();
            $table->string('nome');
            $table->text('descricao');
            $table->double('preco', 10, 2);
            $table->string('slug');
            $table->string('imagem')->nullable(); //Aceita campo nulo

            $table->unsignedBigInteger('id_user');// Interligação com uma tabela estrangeira
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');// Cria uma ligação com a tabela relacionada e caso a coluna relacionada for apagada, esse dado também será

            $table->unsignedBigInteger('id_categorias');
            $table->foreign('id_categorias')->references('id')->on('categorias')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
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
};
