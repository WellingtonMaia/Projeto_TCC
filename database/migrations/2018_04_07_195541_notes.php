<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Notes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {                   
        Schema::create('notes', function (Blueprint $table) {
            $table->increments("id");
            $table->char("name",250);
            $table->text("description");
            // $table->foreign("task_id")->references("id")->on("tasks");                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
}
