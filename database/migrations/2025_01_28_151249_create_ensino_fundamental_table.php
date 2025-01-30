<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ensino_fundamental', function (Blueprint $table) {
            $table->id();
            $table->text('componente'); // Ex: Geografia, Matemática
            $table->text('ano_faixa'); // Ex: 7º Ano
            $table->text('praticas_de_linguagem'); // Ex: Clima e Vegetação
            $table->text('objetos_de_conhecimento'); // Conteúdo específico
            $table->text('habilidades'); // Competências esperadas
            $table->text('comentario')->nullable(); // Comentário adicional
            $table->text('possibilidades_para_o_curriculo')->nullable(); // Sugestões curriculares
        });
       

        // Inserindo os primeiros dados
        DB::table('ensino_fundamental')->insert([
           
        ]);
    }



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ensino_fundamental');
    }
};
