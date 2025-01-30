<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FundamentalController extends Controller
{

    public function gerarPdf(Request $request) {
        $dados = $request->all();
    
        $pdf = Pdf::loadView('pdf.planejamento_fundamental', compact('dados'));
    
        return $pdf->download('planejamento_aula.pdf');
    }
    public function create()
    {
        // Busca os anos distintos da coluna 'ano_faixa'
        $anos = DB::table('ensino_fundamental')->select('ano_faixa')->distinct()->get();

        // Retorna a view passando os anos como variável
        return view('ensino_fundamental/form', compact('anos'));
    }
    public function getProjetos($ano)
    {
        // Busca os projetos do banco filtrando pelo ano_faixa
        $projetos = DB::table('ensino_fundamental')
            ->where('ano_faixa', $ano)
            ->select('componente', 'praticas_de_linguagem', 'objetos_de_conhecimento', 'habilidades','comentario','possibilidades_para_o_curriculo')
            ->get();

        return response()->json($projetos);
    }

    

    public function generatePdf()
    {
        // Recupera os dados armazenados na sessão
        $data = session('lesson_data');

        // Gera o PDF usando a visualização
        $pdf = Pdf::loadView('pdf', compact('data'));

        // Faz o download do arquivo PDF
        return $pdf->download('plano_de_aula.pdf');
    }
}
