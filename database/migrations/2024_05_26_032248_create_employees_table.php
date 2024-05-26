<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->String('emp_id');
            $table->text('emp_name');
            $table->date('birthday');
            $table->enum('gender', ['male', 'female']);
            $table->string('phone');
            $table->text('address');
            $table->string('email')->unique();
            $table->enum('job_type', ['office_employee', 'site_employee']);
            $table->date('joined_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
