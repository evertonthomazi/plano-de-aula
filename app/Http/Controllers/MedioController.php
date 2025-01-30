<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedioController extends Controller
{
    public function gerarPdf(Request $request) {
        $dados = $request->all();
        $pdf = Pdf::loadView('pdf.planejamento_medio', compact('dados'));
        return $pdf->download('planejamento_aula.pdf');
    }

    public function create()
    {
        // Busca os anos distintos da coluna 'ano_faixa' para o Ensino Médio
        $anos = DB::table('ensino_medio')->select('ano_faixa')->distinct()->get();
        return view('ensino_medio.form', compact('anos'));
    }

    public function getProjetos($ano)
    {

        // Busca os projetos do banco filtrando pelo ano_faixa no Ensino Médio
        $projetos = DB::table('ensino_medio')
            ->where('ano_faixa', $ano)
            ->select('*')
            ->get();

        return response()->json($projetos);
    }

    public function generatePdf()
    {
        // Recupera os dados armazenados na sessão
        $data = session('lesson_data');
        $pdf = Pdf::loadView('pdf.planejamento_medio', compact('data'));
        return $pdf->download('plano_de_aula.pdf');
    }
}
