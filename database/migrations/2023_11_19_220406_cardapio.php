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
        Schema::create("cardapio", function (Blueprint $table) {
            $table->increments("id")->autoIncrement();
            $table->string("item", 40);
            $table->text("imagem");
            $table->float("valor", 5, 2);
            $table->string("descricao");
            $table->string("categoria", 50);
            $table->boolean("disponivel");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("cardapio");
    }
};
