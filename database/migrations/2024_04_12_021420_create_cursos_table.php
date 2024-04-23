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
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->integer('grado');
            $table->string('paralelo');
            $table->integer('gestion');
            $table->unsignedBigInteger('nivel_id');
            $table->string('nombre_completo');

            $table->foreign('nivel_id')->references('id')->on('nivels')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->unique(['grado', 'paralelo', 'gestion', 'nivel_id']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cursos');
    }
};
