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
            $table->char("name");
            $table->text("description");
            $table->datetime("estimated_date");
            $table->time("estimated_time");
            $table->enum("status",["A"],["I"]);
            $table->date("begin_date");
            $table->date("final_date");
            $table->datetime("created_at");
            $table->foreign("project_id")->references("id")->on("project")
            $table->
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
