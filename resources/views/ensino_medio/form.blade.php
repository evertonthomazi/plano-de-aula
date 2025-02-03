<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANEJAMENTO ANUAL</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .title-referencia {
            display: flex;
            justify-content: center;
        }
    </style>
</head>

<body>
    <div class="container my-4">
        <h4 class="text-center mb-4">PLANEJAMENTO ANUAL</h4>

        <!-- Cabeçalho -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Cabeçalho</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="curso" class="form-label">Curso:</label>
                        <input type="text" id="curso" class="form-control" value="ENSINO MÉDIO" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="materia" class="form-label">Matéria:</label>
                        <input type="text" id="materia" class="form-control" placeholder="Matéria">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="professor" class="form-label">Professor:</label>
                        <input type="text" id="professor" class="form-control" placeholder="Nome do Professor">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="aulas" class="form-label">Nº Aulas Semanais:</label>
                        <input type="number" id="aulas" class="form-control" placeholder="Número de aulas">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="ano" class="form-label">Ano:</label>
                        <select id="ano" class="form-control">
                            <option value="">Selecione um ano</option>
                            @foreach ($anos as $ano)
                            <option value="{{ $ano->ano_faixa }}">{{ $ano->ano_faixa }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Objetivos -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Objetivos</div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="objetivo-geral" class="form-label">Objetivo Geral da Matéria:</label>
                    <textarea id="objetivo-geral" class="form-control" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="objetivo-especifico" class="form-label">Objetivo Específico:</label>
                    <textarea id="objetivo-especifico" class="form-control" rows="3"></textarea>
                </div>
            </div>
        </div>

        <!-- Trimestres -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Trimestres</div>
            <div class="card-body">
                <!-- Similar to the previous form, add sections for each trimester -->
                @for ($i = 1; $i <= 3; $i++)
                    <div class="mb-3">
                    <h5>{{ $i }}º Trimestre</h5>
                    <button class="btn btn-outline-primary btn-sm btn-trimestre"
                        data-trimestre="{{ $i }}">Adicionar Projetos Integradores</button>
                    <table class="table table-bordered mt-3" id="tabela-trimestre-{{ $i }}"
                        style="display:none;">
                        <thead>
                            <tr>
                                <th>Selecionar</th>
                                <th>Matéria</th>
                                <th>Código da Habilidade</th>
                                <th>Habilidade</th>
                            </tr>
                        </thead>
                        <tbody id="modalTabelaTrimestre-{{ $i }}">
                            <tr>
                                <td colspan="5" class="text-center">Nenhum dado encontrado.</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered mt-3" id="itensSelecionados-{{ $i }}"
                        style="display:none;">
                        <thead>
                            <tr>
                                <th>Matéria</th>
                                <th>Código da Habilidade</th>
                                <th>Habilidade</th>
                            </tr>
                        </thead>
                        <tbody id="itensTabela-{{ $i }}">
                            <!-- Itens selecionados serão adicionados aqui -->
                        </tbody>
                    </table>
            </div>
            <hr>
            @endfor
        </div>
    </div>

    <!-- Diagnóstico / Perfil de Turma -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">Diagnóstico / Perfil de Turma</div>
        <div class="card-body">
            <textarea id="diagnostico" class="form-control" rows="4"></textarea>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header bg-secondary text-white title-referencia">Referências BNCC</div>
        <div class="card-body" id="referenciasContainer">
        </div>
    </div>

    <!-- Botão Finalizar -->
    <div class="text-center py-4">
        <button class="btn btn-success w-100" id="btnSalvar">Imprimir Planejamento</button>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="trimestreModal" tabindex="-1" aria-labelledby="trimestreModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="trimestreModalLabel">Projetos Integradores - <span
                            id="modalTrimestre"></span></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Filtro de Matéria -->
                    <div class="mb-3">
                        <label for="filtroMateria" class="form-label">Filtrar por Matéria:</label>
                        <input type="text" class="form-control" id="filtroMateria"
                            placeholder="Digite o nome da matéria para filtrar...">
                    </div>

                    <!-- Tabela de Projetos Integradores -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Selecionar</th>
                                <th>Matéria</th>
                                <th>Código da Habilidade</th>
                                <th>Habilidade</th>
                            </tr>
                        </thead>
                        <tbody id="modalTabela">
                            <tr>
                                <td colspan="7" class="text-center">Carregando...</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#btnSalvar").click(function() {
                let curso = $("#curso").val();
                let materia = $("#materia").val();
                let professor = $("#professor").val();
                let aulas = $("#aulas").val();
                let ano = $("#ano").val();

                if (!curso || !materia || !professor || !aulas || !ano) {
                    alert("Preencha todos os campos obrigatórios antes de salvar!");
                    return;
                }

                let objetivos = {
                    objetivo_geral: $("#objetivo-geral").val(),
                    objetivo_especifico: $("#objetivo-especifico").val(),
                    diagnostico: $("#diagnostico").val()
                };

                let trimestres = [];
                for (let i = 1; i <= 3; i++) {
                    let trimestreData = [];
                    $("#itensTabela-" + i + " tr").each(function() {
                        let tds = $(this).find("td");
                        if (tds.length > 0) {
                            trimestreData.push({
                                materia: tds.eq(0).text(),
                                codigo_habilidade: tds.eq(1).text(),
                                habilidade: tds.eq(2).text()
                            });
                        }
                    });
                    trimestres.push({
                        trimestre: i,
                        dados: trimestreData
                    });
                }

                let referencias = [];
                $("#referenciasContainer .border").each(function() {
                    let referencia = {
                        ano_faixa: $(this).find("span").eq(0).text(),
                        materia: $(this).find("span").eq(1).text(),
                        habilidades: $(this).find("p").eq(0).text(),
                        codigo_habilidade: $(this).find("p").eq(1).text(),
                        comentario: $(this).find("p").eq(2).text(),
                        possibilidades: $(this).find("p").eq(3).text()
                    };
                    referencias.push(referencia);
                });

                let formData = {
                    _token: "{{ csrf_token() }}",
                    curso: curso,
                    materia: materia,
                    professor: professor,
                    aulas: aulas,
                    ano: ano,
                    objetivos: objetivos,
                    trimestres: trimestres,
                    referencias: referencias
                };

                $.ajax({
                    url: "gerar-pdf-medio",
                    type: "POST",
                    data: JSON.stringify(formData),
                    contentType: "application/json",
                    xhrFields: {
                        responseType: 'blob'
                    },
                    success: function(response) {
                        let blob = new Blob([response], {
                            type: 'application/pdf'
                        });
                        let link = document.createElement('a');
                        link.href = window.URL.createObjectURL(blob);
                        link.download = "planejamento_aula_ensino_medio.pdf";
                        link.click();
                    },
                    error: function(response) {
                        alert("Erro ao gerar o PDF. Verifique os dados e tente novamente.");
                    }
                });
            });

            function removerAcentos(str) {
                return str.normalize("NFD").replace(/[\u0300-\u036f]/g, ""); // Remove acentos
            }

            $("#filtroMateria").on("input", function() {
                var filtro = removerAcentos($(this).val().toLowerCase());
                $("#modalTabela tr").filter(function() {
                    var materia = removerAcentos($(this).find("td:nth-child(2)").text().toLowerCase());
                    $(this).toggle(materia.indexOf(filtro) > -1);
                });
            });

            $(".btn-trimestre").click(function() {
                let trimestre = $(this).data("trimestre");
                let anoSelecionado = $("#ano").val();

                if (!anoSelecionado) {
                    alert("Por favor, selecione um ano antes de continuar.");
                    return;
                }

                $("#modalTrimestre").text(trimestre + "º Trimestre");
                $("#modalTabela").html('<tr><td colspan="7" class="text-center">Carregando...</td></tr>');

                $.ajax({
                    url: "get-habilidades-medio/" + anoSelecionado,
                    type: "GET",
                    success: function(response) {
                        let html = "";
                        if (response.length > 0) {
                            response.forEach((habilidade, index) => {
                                html += `<tr>
                                    <td><button class="btn btn-outline-success btn-sm btn-select" data-index="${index}" data-habilidade='${JSON.stringify(habilidade)}'>Selecionar</button></td>
                                    <td>${habilidade.materia}</td>
                                    <td>${habilidade.codigo_habilidade}</td>
                                    <td>${habilidade.habilidade}</td>
                                </tr>`;
                            });
                        } else {
                            html = '<tr><td colspan="7" class="text-center">Nenhum dado encontrado.</td></tr>';
                        }
                        $("#modalTabela").html(html);
                    },
                    error: function() {
                        $("#modalTabela").html('<tr><td colspan="7" class="text-center text-danger">Erro ao carregar os dados.</td></tr>');
                    }
                });

                $("#trimestreModal").modal("show");
            });

            $(document).on("click", ".btn-select", function() {
                let habilidade = $(this).data("habilidade");
                let anoSelecionado = $("#ano").val();
                let trimestre = $("#modalTrimestre").text().split("º")[0];
                let tabelaId = "#itensTabela-" + trimestre;

                $(tabelaId).closest("table").show();
                $(tabelaId).append(`
                    <tr>
                        <td>${habilidade.materia}</td>
                        <td>${habilidade.codigo_habilidade}</td>
                        <td>${habilidade.habilidade}</td>
                    </tr>
                `);

                let referenciaHtml = `
                    <div class="border p-3 rounded bg-light mb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Ano/Faixa:</strong> <span>${anoSelecionado}</span>
                            <strong>Matéria:</strong> <span>${habilidade.materia || 'Não informado'}</span>
                        </div>
                        <hr>
                        <div class="mt-3">
                            <h5>Habilidades</h5>
                            <p>${habilidade.habilidade}</p>
                        </div>
                    </div>
                `;

                $("#referenciasContainer").append(referenciaHtml);
                $("#trimestreModal").modal("hide");
            });
        });
    </script>

</body>

</html>