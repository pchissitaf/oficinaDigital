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
        Schema::create('orden_servicos', function (Blueprint $table) {
            $table->id();
            $table->string('valor_total');
            $table->string('observacao');
            $table->string('estado');
            $table->unsignedBigInteger('orcamento_id');
            $table->unsignedBigInteger('funcionario_id');
            $table->timestamps();

            $table->foreign('orcamento_id')->references('id')->on('orcamentos');
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orden_servicos');
    }
};
