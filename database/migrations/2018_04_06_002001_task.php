<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments("id");
            $table->char("nome");
            $table->text("descricao");
            $table->datetime("prazo_estimado");
            $table->time("tempo_estimado");
            $table->enum("status",["A"],["I"]);
            $table->date("data_inicio");
            $table->date("data_final");
            $table->date("data_criacao");
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
}
