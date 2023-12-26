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
        Schema::create('qr_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('house_number')->nullable(false);
            $table->longText('full_address')->nullable(false);
            $table->longText('qr_code')->nullable(false);
            $table->boolean('is_generated')->default(0);
            $table->boolean('is_paid')->default(0);
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('agent_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_profiles');
    }
};
