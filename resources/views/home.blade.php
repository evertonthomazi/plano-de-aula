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
    <div class="container">
        <h1 class="mb-4">Escolha o Nível de Ensino</h1>
        <div class="d-flex justify-content-center gap-4">
            <a href="{{ url('/fundamental') }}" class="btn btn-primary btn-lg">Ensino Fundamental</a>
            <a href="{{ url('/medio') }}" class="btn btn-success btn-lg">Ensino Médio</a>
        </div>
    </div>
</body>
</html>
