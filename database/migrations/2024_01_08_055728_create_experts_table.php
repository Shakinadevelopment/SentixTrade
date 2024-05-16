<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experts', function (Blueprint $table) {
            $table->id();
            $table->string('sku');
            $table->string('name');
            $table->integer('quantity');
            $table->string('price');
            $table->string('stock');
            $table->string('brand');
            $table->string('manufacture');
            $table->string('photo');
            $table->string('link');
            $table->string('description');
            $table->string('related');
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
        Schema::dropIfExists('experts');
    }
}
