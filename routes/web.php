<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FundamentalController;
use App\Http\Controllers\MedioController;


Route::get('/fundamental', [FundamentalController::class, 'create']);
Route::post('/submit', [FundamentalController::class, 'store']); // Processar dados e exibir
Route::get('/generate-pdf', [FundamentalController::class, 'generatePdf']); // Gerar PDF
Route::get('/get-projetos/{ano}', [FundamentalController::class, 'getProjetos']);
Route::post('/gerar-pdf', [FundamentalController::class, 'gerarPdf']);
require __DIR__.'/auth.php';


Route::get('/', function () {
    return view('home');
});


Route::get('/medio', [MedioController::class, 'create']);
Route::get('/get-habilidades-medio/{ano}', [MedioController::class, 'getProjetos']);
Route::post('/gerar-pdf-medio', [MedioController::class, 'gerarPdf']);

