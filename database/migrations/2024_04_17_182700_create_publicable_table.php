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
        Schema::create('publicables', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('publicable_id');
            $table->string('publicable_type');

            $table->unsignedBigInteger('publicacion_id');
            
            $table->foreign('publicacion_id')->references('id')->on('publicacions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->timestamps();

            $table->index(['publicable_id', 'publicable_type', 'publicacion_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('publicables');
    }
};
