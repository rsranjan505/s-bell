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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->unsignedBigInteger('team_manager_id')->nullable();
            $table->unsignedBigInteger('team_lead_id')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->boolean('is_active')->default(1);
            $table->timestamps();
            $table->foreign('team_manager_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('team_lead_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
