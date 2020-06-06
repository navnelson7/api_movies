<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailsalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detailsales', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sales_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->date('date_sale');
            $table->decimal('price_sale',8,2);
            $table->foreign('sales_id')
                ->references('id')
                ->on('sales')
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
        Schema::dropIfExists('detailsales');
    }
}
