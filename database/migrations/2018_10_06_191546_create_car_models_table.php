<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_models', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('car_brand_id');
            $table->string('name', 100);
            $table->timestamps();

            $table->foreign('car_brand_id')
                ->references('id')
                ->on('car_brands');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::enableForeignKeyConstraints();
        Schema::dropIfExists('car_models');
        Schema::disableForeignKeyConstraints();
    }
}
