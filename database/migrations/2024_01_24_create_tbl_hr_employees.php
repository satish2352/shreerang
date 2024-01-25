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
        Schema::create('tbl_hr_employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('organization_id'); 
            $table->string('employee_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('address');
            $table->string('role_id');
            $table->string('department_id');
            $table->string('aadhar_number')->nullable();
            $table->string('pancard_number')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('highest_qualification')->nullable();
            $table->string('gender')->nullable();
            $table->date('joining_date')->nullable();
            $table->string('image');
            $table->boolean('is_deleted')->default(false);
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
        Schema::dropIfExists('tbl_hr_employees');
    }
};
