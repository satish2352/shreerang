<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('designs_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('designs_id');
            $table->string('design_name');
            $table->string('product_quantity');
            $table->string('product_size');
            $table->string('product_unit');
            $table->string('is_deleted')->default(false);
            $table->boolean('is_active')->default(true);
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
        Schema::dropIfExists('designs_details');
    }
};
