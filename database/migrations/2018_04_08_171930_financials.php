<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Financials extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('financials', function (Blueprint $table) {
            $table->increments("id");
            $table->char("name",255);
            $table->enum("status",["A","I"]);
            $table->date("due_date");
            $table->enum("account_type",["P","R","F"]);
            $table->double("value");
            $table->text("description")->nullable();
            $table->char("tags",50);
            $table->char("financial_classification",255);
            $table->char("cost_center",255);
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
        Schema::dropIfExists('financials');

    }
}
