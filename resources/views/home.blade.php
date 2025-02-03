<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escolha o Nível de Ensino</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }

        .container {
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container d-flex flex-column justify-content-center align-items-center vh-100 text-center">
        <h1 class="mb-4">Escolha o Nível de Ensino</h1>
        <div class="conteudo w-75 mb-4">
            <span>Bem-vindo ao seu painel de planejamento de aulas estruturado com base na Base Nacional Comum Curricular (BNCC). Aqui, você poderá organizar suas aulas de maneira eficiente, garantindo alinhamento com as competências e habilidades exigidas para cada etapa do ensino.
                <br>
                Escolha o nível de ensino abaixo para acessar recursos, objetivos de aprendizagem e sugestões pedagógicas personalizadas para o Ensino Fundamental ou Ensino Médio.

                Torne o processo de ensino mais dinâmico e alinhado às diretrizes educacionais!</span>
        </div>
        <div class="d-flex justify-content-center gap-4">
            <a href="{{ url('/fundamental') }}" class="btn btn-primary btn-lg">Ensino Fundamental</a>
            <a href="{{ url('/medio') }}" class="btn btn-success btn-lg">Ensino Médio</a>
        </div>
    </div>
</body>


</html>