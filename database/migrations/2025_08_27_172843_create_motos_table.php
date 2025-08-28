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
        Schema::create('motos', function (Blueprint $table) {
            $table->id();
             $table->string('modelo');
            $table->string('marca');
            $table->string('matricula')->unique();
            $table->year('ano');
            $table->string('cor');
            $table->enum('estado', ['ativa', 'manutencao', 'parada'])->default('ativa');

            $table->unsignedBigInteger('motoqueiro_id');
            $table->foreign('motoqueiro_id')->references('id')->on('users')->onDelete('cascade');

            $table->date('data_entrada');
            $table->date('data_saida')->nullable();
            $table->text('observacoes')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motos');
    }
};
