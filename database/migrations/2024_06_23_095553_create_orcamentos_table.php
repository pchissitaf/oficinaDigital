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
        Schema::create( 'orcamentos', function (Blueprint $table) {
            $table->id();
            $table->float('valor');
            $table->integer('estado');
            $table->unsignedBigInteger('servico_id');
            $table->unsignedBigInteger('cliente_id');
            $table->timestamps();

            $table->foreign('servico_id')->references('id')->on('servicos');
            $table->foreign('cliente_id')->references('id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orcamentos');
    }
};
