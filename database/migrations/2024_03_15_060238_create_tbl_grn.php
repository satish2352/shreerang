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
        Schema::create('tbl_grn', function (Blueprint $table) {
            $table->id();
            $table->string('grn_date');
            $table->string('purchase_id');
            $table->string('po_date');
            $table->string('invoice_no');
            $table->string('invoice_date');
            $table->text('remark');
            $table->string('image')->nullable();
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
        Schema::dropIfExists('grn');
    }
};
