<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
			$table->string('name', 50);
			$table->text('recept');
			$table->integer('carbohydrates')->unsigned()->nullable();
			$table->integer('fats')->unsigned()->nullable();
			$table->integer('protein')->unsigned()->nullable();
			$table->integer('calories')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal');
    }
}
