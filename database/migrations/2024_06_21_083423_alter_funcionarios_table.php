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
        Schema::table('funcionarios', function (Blueprint $table) {
            $table->foreignId('nivel_id')->after('doc_file')->default(6)->constrained('nivels');
            $table->foreignId('user_id')->after('salario')->default(6)->constrained('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::create('funcionarios', function (Blueprint $table) {
            $table->dropColumn('nivel_id');
            $table->dropColumn('user_id');
        });
    }
};
