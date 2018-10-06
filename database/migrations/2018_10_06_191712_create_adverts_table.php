<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adverts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('car_model_id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('year',9);
            $table->string('color');
            $table->string('picture');
            $table->enum('status', [0,1,2])
                ->default(0)
                ->comment('0=scrap, 1=active, 2=sold');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');

            $table->foreign('car_model_id')
                ->references('id')
                ->on('car_models');
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
        Schema::dropIfExists('adverts');
        Schema::disableForeignKeyConstraints();
    }
}
