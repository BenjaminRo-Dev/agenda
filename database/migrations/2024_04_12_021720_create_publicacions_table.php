<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('publicacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('detalle');
            $table->date('fechaPublicacion');
            $table->date('fechaActividad');
            $table->integer('gestion');
            $table->unsignedBigInteger('tipo_publicacion_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('tipo_publicacion_id')->references('id')->on('tipo_publicacions')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');



            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('publicacions');
    }
};
