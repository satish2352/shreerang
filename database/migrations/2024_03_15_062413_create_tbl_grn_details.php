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
        Schema::create('tbl_grn_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('grn_id');
            $table->text('description');
            $table->text('qc_check_remark');            
            $table->string('chalan_quantity');
            $table->string('actual_quantity');
            $table->string('accepted_quantity');
            $table->string('rejected_quantity');                        
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
        Schema::dropIfExists('grn_details');
    }
};
