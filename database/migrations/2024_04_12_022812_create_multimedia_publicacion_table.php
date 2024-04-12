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
        Schema::create('multimedia_publicacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publicacion_id');
            $table->unsignedBigInteger('multimedia_id');

            $table->foreign('publicacion_id')->references('id')->on('publicacions')->onDelete('cascade');
            $table->foreign('multimedia_id')->references('id')->on('multimedia')->onDelete('cascade');

            $table->unique(['publicacion_id', 'multimedia_id']);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('multimedia_publicacion');
    }
};
