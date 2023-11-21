<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create("usuarios", function (Blueprint $table) {
            $table->uuid("id")->primary()->autoIncrement();
            $table->string("nome", 20);
            $table->string("sobrenome", 50);
            $table->string("email", 100);
            $table->string("telefone", 13);
            $table->string("cpf", 14);
            $table->string("senha");
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
