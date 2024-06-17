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
        /*Schema::table('clientes', function (Blueprint $table) {
            $table->unsignedBigInteger('carro_id')->after('telefone');
            
            $table->foreignId('carro_id')->references('id')->on('carros');
        });*/

        Schema::table('clientes', function (Blueprint $table) {
            $table->foreignId('carro_id')->after('telefone')->constrained('carros');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('clientes', function (Blueprint $table) {
            $table->dropColumn('carro_id');
        });
    }
};
