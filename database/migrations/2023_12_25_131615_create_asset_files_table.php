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
        Schema::create('asset_files', function (Blueprint $table) {
            $table->bigIncrements('id','255');
            $table->enum('document_type',['avatar','support_document','other'])->nullable();
            $table->string('model_type')->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('filename','100');
            $table->string('filetype','20');
            $table->string('filepath','255');
            $table->integer('size')->nullable(true);
            $table->smallInteger('width')->nullable(true);
            $table->smallInteger('height')->nullable(true);
            $table->string('url');
            $table->string('original_name');
            $table->string('created_by');
            $table->tinyInteger('is_active')->default(1);
            $table->timestamp('created_at')->nullable();
			$table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asset_files');
    }
};
