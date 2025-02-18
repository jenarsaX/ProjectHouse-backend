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
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('tamaño');
            $table->string('precio');
            $table->string('estatus');
            $table->string('description');
            $table->string('fecha_agregado');
            $table->unsignedBigInteger('id_administrador')->nullable();
            $table->string('pisos');
            $table->timestamps();
            $table->foreign('id_administrador')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
