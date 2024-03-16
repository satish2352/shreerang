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
        Schema::create('design_revision_for_prod', function (Blueprint $table) {
            $table->id();
            $table->string('business_id');
            $table->string('design_id');
            $table->string('production_id');
            $table->boolean('reject_reason_prod');
            $table->boolean('remark_by_design');
            $table->boolean('is_active')->default(true);
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('design_revision_for_prod');
    }
};
