<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ensino_medio', function (Blueprint $table) {
            $table->id();
            $table->text('ano_faixa'); // Ex: 1º Ano
            $table->text('materia'); // Ex: Matemática
            $table->text('codigo_habilidade'); // Código da habilidade
            $table->text('habilidade'); // Descrição da habilidade
            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('ensino_medio');
    }
};
