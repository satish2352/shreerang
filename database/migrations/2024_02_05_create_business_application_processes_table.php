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
        Schema::create('business_application_processes', function (Blueprint $table) {
            $table->id();
            $table->string('business_id');
            $table->string('business_status_id');
            $table->string('design_id');
            $table->string('design_status_id');
            $table->string('production_id');
            $table->string('production_status_id');
            $table->boolean('is_approve')->default(false);
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
        Schema::dropIfExists('business_application_processes');
    }
};
