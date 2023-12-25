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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name',64)->nullable();
            $table->string('last_name',64)->nullable();
            $table->string('email')->nullable();
            $table->string('mobile',100);
            $table->unsignedBigInteger('role_id')->nullable();
            $table->enum('user_type',['admin','employee','agent','users'])->default('users');
            $table->integer('department_id')->nullable();
            $table->integer('designation_id')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->string('address',200)->nullable();
			$table->unsignedBigInteger('state_id')->nullable();
			$table->unsignedBigInteger('city_id')->nullable();
            $table->string('pincode',20)->nullable();
            $table->boolean('is_active')->default(1);
            $table->dateTime('last_login')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
