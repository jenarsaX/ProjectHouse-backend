<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('dni', 8);
            $table->string('telefono', 9);
            $table->string('email');
            $table->string('fecha_nacimiento');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
