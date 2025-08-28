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
        Schema::create('motoqueiro_Rua', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motoqueiro_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('moto_id')->constrained('motos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motoqueiro_no_campos');
    }
};
