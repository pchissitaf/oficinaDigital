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
        //
       /* Schema::table('carros', function (Blueprint $table) {
            $table->unsignedBigInteger('estado_carro_id')->default(2)->after('tipo');
            
            $table->foreignId('estado_carro_id')->references('id')->on('estado_carros');
        });*/
        Schema::table('carros', function (Blueprint $table) {
            $table->foreignId('estado_carro_id')->default(2)->after('tipo')->constrained('estado_carros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('carros', function (Blueprint $table) {
            $table->dropColumn('estado_carro_id');
        });
    }
};
