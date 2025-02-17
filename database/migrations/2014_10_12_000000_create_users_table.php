<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('dni', 8)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone',9)->nullable();
            $table->string('date_nac')->nullable();
            $table->boolean('active')->default(true); 
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert([
            [
                'email' => 'jenarsav@com.pe',
                'name' => 'Jose Alberto',
                'password' => Hash::make('@mela123'),
                'active' => true,
            ]
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
