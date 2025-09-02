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
       Schema::create('Garagem',function(Blueprint $table){
         $table->id();
         $table->string('name');
         $table->string('moto');
         $table->decimal('cota',10,2)->default(5000);
         $table->decimal('divida',10,2)->default(0);
         $table->decimal('multa',10,2)->default(0);
         $table->time('hora_de_chegada');
         $table->timestamps();
       });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
       schema::dropIfExists('garagem');
    }
};
