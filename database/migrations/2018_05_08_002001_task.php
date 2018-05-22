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
            $table->char("name",250);
            $table->text("description");
            $table->date("estimate_date");
            $table->time("estimate_time");
            $table->enum("status",["A","I"]);
            $table->date("begin_date");
            $table->date("final_date");
            $table->integer("project_id");
            $table->foreign("project_id")->references("id")->on("projects"); 
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
        Schema::dropIfExists('tasks');

    }
}
