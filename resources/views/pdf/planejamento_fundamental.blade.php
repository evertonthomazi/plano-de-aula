<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 14px;
            text-align: center;
            margin: 20px;
        }

        h1,
        h2 {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        p {
            margin: 5px 0;
        }

        .section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #000;
            border-radius: 5px;
        }

        .divider {
            border-top: 1px solid #000;
            margin: 15px 0;
        }
    </style>
</head>

<body>

    <h4 class="text-center mb-4">PLANEJAMENTO ANUAL - 2024</h4>

    <div class="section">
        <p><strong>Curso:</strong> {{ $dados['curso'] }}</p>
        <p><strong>Componente Curricular:</strong> {{ $dados['componente'] }}</p>
        <p><strong>Professor:</strong> {{ $dados['professor'] }}</p>
        <p><strong>Nº Aulas Semanais:</strong> {{ $dados['aulas'] }}</p>
        <p><strong>Ano:</strong> {{ $dados['ano'] }}</p>
    </div>

    <div class="section">
        <h2>Objetivos</h2>
        <p><strong>Objetivo Geral:</strong> {{ $dados['objetivos']['objetivo_geral'] }}</p>
        <p><strong>Objetivo Específico:</strong> {{ $dados['objetivos']['objetivo_especifico'] }}</p>
        <p><strong>Diagnóstico:</strong> {{ $dados['objetivos']['diagnostico'] }}</p>
    </div>

    @foreach ($dados['trimestres'] as $trimestre)
    <h2>{{ $trimestre['trimestre'] }}º Trimestre</h2>
    @if (count($trimestre['dados']) > 0)
    <table>
        <thead>
            <tr>
                <th>Componente</th>
                <th>Práticas de Linguagem</th>
                <th>Objetos de Conhecimento</th>
                <th>Habilidades</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trimestre['dados'] as $projeto)
            <tr>
                <td>{{ $projeto['componente'] }}</td>
                <td>{{ $projeto['praticas_de_linguagem'] }}</td>
                <td>{{ $projeto['objetos_de_conhecimento'] }}</td>
                <td>{{ $projeto['habilidades'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Nenhum projeto integrado adicionado.</p>
    @endif
    @endforeach

    <h2>Referências BNCC</h2>
    @foreach ($dados['referencias'] as $referencia)
    <div class="section">
        <p><strong>Ano/Faixa:</strong> {{ $referencia['ano_faixa'] }}</p>
        <p><strong>Unidade Temática:</strong> {{ $referencia['unidade_tematica'] }}</p>
        <p><strong>Habilidades:</strong> {{ $referencia['habilidades'] }}</p>
        <p><strong>Objetos de Conhecimento:</strong> {{ $referencia['objetos_conhecimento'] }}</p>
        <p><strong>Comentário:</strong> {{ $referencia['comentario'] }}</p>
        <p><strong>Possibilidades para o Currículo:</strong> {{ $referencia['possibilidades'] }}</p>
    </div>
    @endforeach

</body>

</html>