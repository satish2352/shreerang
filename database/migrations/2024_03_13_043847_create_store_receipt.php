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
        Schema::create('store_receipt', function (Blueprint $table) {
            $table->id();
            $table->string('store_date');
            $table->string('name');
            $table->string('contact_number');
            $table->text('remark');
            $table->string('signature')->nullable();
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
        Schema::dropIfExists('store_receipt');
    }
};
