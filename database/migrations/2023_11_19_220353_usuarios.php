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
        Schema::create("usuarios", function (Blueprint $table) {
            $table->uuid("id")->primary();
            $table->string("nome", 20);
            $table->string("sobrenome", 50);
            $table->string("email", 50);
            $table->string("telefone", 12);
            $table->string("cpf", 11);
            $table->string("senha", 20);
            $table->boolean("status");
            $table->dateTime("sessao")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("usuarios");
    }
};
