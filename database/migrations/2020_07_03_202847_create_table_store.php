<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            // colunas da tabela de lojas
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');

            $table->string('name');
            $table->string('description');
            $table->string('phone');
            $table->string('mobile_phone');
            $table->string('slug');

            $table->foreign('user_id')->references('id')->on('users')->OnDelete('cascade'); //define a coluna id_user como chave estrangeira que é referencia da coluna id da tabela users


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
        Schema::dropIfExists('stores');
    }
}
