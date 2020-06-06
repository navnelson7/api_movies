<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailrentalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailrentals', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rental_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->date('date_return');
            $table->boolean('returned');
            $table->foreign('rental_id')
                ->references('id')
                ->on('rentals')
                ->onDelete('cascade');
            $table->foreign('movie_id')
                ->references('id')
                ->on('stocks')
                ->onDelete('cascade');
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
        Schema::dropIfExists('detailrentals');
    }
}
