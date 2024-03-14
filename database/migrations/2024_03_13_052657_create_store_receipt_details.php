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
        Schema::create('store_receipt_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_receipt_id');
            $table->string('quantity');
            $table->text('description');
            $table->string('price');
            $table->string('amount');
            $table->string('total');            
            $table->boolean('is_approve')->default(false);
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
        Schema::dropIfExists('store_receipt_details');
    }
};
