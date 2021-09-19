<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.quantity
     *quantity
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('fa_title');
            $table->string('en_title');
            $table->unsignedDouble('price')->default(0);
            $table->unsignedInteger('inventory')->default(0);
            $table->unsignedInteger('sales')->default(0);
            $table->unsignedInteger('visits')->default(0);
            $table->text('review')->nullable();
            $table->json('primary_specifications')->nullable();
            $table->json('special_specifications')->nullable();
            $table->unsignedTinyInteger('status')->default(1);

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
        Schema::dropIfExists('products');
    }
}
