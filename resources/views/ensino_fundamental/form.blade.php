<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANEJAMENTO ANUAL - 2024</title>
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
        <h4 class="text-center mb-4">PLANEJAMENTO ANUAL - 2024</h4>

        <!-- Cabeçalho -->
        <div class="card mb-4">
            <div class="card-header bg-secondary text-white">Cabeçalho</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="curso" class="form-label">Curso:</label>
                        <input type="text" id="curso" class="form-control" value="ENSINO FUNDAMENTAL" readonly>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="componente" class="form-label">Componente Curricular:</label>
                        <input type="text" id="componente" class="form-control" placeholder="Exemplo: GEOGRAFIA">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="professor" class="form-label">Professor:</label>
                        <input type="text" id="professor" class="form-control" placeholder="Exemplo: EVERTON LEITE">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="aulas" class="form-label">Nº Aulas Semanais:</label>
                        <input type="number" id="aulas" class="form-control" placeholder="Exemplo: 3">
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
                    <label for="objetivo-geral" class="form-label">Objetivo Geral do Componente Curricular:</label>
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
                @for ($i = 1; $i <= 4; $i++)
                    <div class="mb-3">
                    <h5>{{ $i }}º Trimestre</h5>
                    <button class="btn btn-outline-primary btn-sm btn-trimestre"
                        data-trimestre="{{ $i }}">Adicionar Projetos Integradores</button>
                    <table class="table table-bordered mt-3" id="tabela-trimestre-{{ $i }}"
                        style="display:none;">
                        <thead>
                            <tr>
                                <th>Selecionar</th>
                                <th>Componente</th>
                                <th>Práticas de Linguagem</th>
                                <th>Objetos de Conhecimento</th>
                                <th>Habilidades</th>
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
                                <th>Componente</th>
                                <th>Práticas de Linguagem</th>
                                <th>Objetos de Conhecimento</th>
                                <th>Habilidades</th>
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
                    <!-- Filtro de Componente -->
                    <div class="mb-3">
                        <label for="filtroComponente" class="form-label">Filtrar por Componente:</label>
                        <input type="text" class="form-control" id="filtroComponente"
                            placeholder="Digite o nome do componente para filtrar...">
                    </div>

                    <!-- Tabela de Projetos Integradores -->
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Selecionar</th>
                                <th>Componente</th>
                                <th>Práticas de Linguagem</th>
                                <th>Objetos de Conhecimento</th>
                                <th>Habilidades</th>
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
                let componente = $("#componente").val();
                let professor = $("#professor").val();
                let aulas = $("#aulas").val();
                let ano = $("#ano").val();

                if (!curso || !componente || !professor || !aulas || !ano) {
                    alert("Preencha todos os campos obrigatórios antes de salvar!");
                    return;
                }

                let objetivos = {
                    objetivo_geral: $("#objetivo-geral").val(),
                    objetivo_especifico: $("#objetivo-especifico").val(),
                    diagnostico: $("#diagnostico").val()
                };

                let trimestres = [];
                for (let i = 1; i <= 4; i++) {
                    let trimestreData = [];
                    $("#itensTabela-" + i + " tr").each(function() {
                        let tds = $(this).find("td");
                        if (tds.length > 0) {
                            trimestreData.push({
                                componente: tds.eq(0).text(),
                                praticas_de_linguagem: tds.eq(1).text(),
                                objetos_de_conhecimento: tds.eq(2).text(),
                                habilidades: tds.eq(3).text()
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
                        unidade_tematica: $(this).find("span").eq(1).text(),
                        habilidades: $(this).find("p").eq(0).text(),
                        objetos_conhecimento: $(this).find("p").eq(1).text(),
                        comentario: $(this).find("p").eq(2).text(),
                        possibilidades: $(this).find("p").eq(3).text()
                    };
                    referencias.push(referencia);
                });

                let formData = {
                    _token: "{{ csrf_token() }}",
                    curso: curso,
                    componente: componente,
                    professor: professor,
                    aulas: aulas,
                    ano: ano,
                    objetivos: objetivos,
                    trimestres: trimestres,
                    referencias: referencias
                };

                $.ajax({
                    url: "gerar-pdf",
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
                        link.download = "planejamento_aula.pdf";
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

            $("#filtroComponente").on("input", function() {
                var filtro = removerAcentos($(this).val().toLowerCase());
                $("#modalTabela tr").filter(function() {
                    var componente = removerAcentos($(this).find("td:nth-child(2)").text()
                        .toLowerCase());
                    $(this).toggle(componente.indexOf(filtro) > -1);
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
                    url: "get-projetos/" + anoSelecionado,
                    type: "GET",
                    success: function(response) {
                        let html = "";
                        if (response.length > 0) {
                            response.forEach((projeto, index) => {
                                html += `<tr>
                            <td><button class="btn btn-outline-success btn-sm btn-select" data-index="${index}" data-projeto='${JSON.stringify(projeto)}'>Selecionar</button></td>
                            <td>${projeto.componente}</td>
                            <td>${projeto.praticas_de_linguagem}</td>
                            <td>${projeto.objetos_de_conhecimento}</td>
                            <td>${projeto.habilidades}</td>
                        </tr>`;
                            });
                        } else {
                            html =
                                '<tr><td colspan="7" class="text-center">Nenhum dado encontrado.</td></tr>';
                        }
                        $("#modalTabela").html(html);
                    },
                    error: function() {
                        $("#modalTabela").html(
                            '<tr><td colspan="7" class="text-center text-danger">Erro ao carregar os dados.</td></tr>'
                        );
                    }
                });

                $("#trimestreModal").modal("show");
            });

            $(document).on("click", ".btn-select", function() {
                let projeto = $(this).data("projeto");
                let anoSelecionado = $("#ano").val();
                let trimestre = $("#modalTrimestre").text().split("º")[0];
                let tabelaId = "#itensTabela-" + trimestre;

                // Extrai o texto dentro dos parênteses em "Habilidades"
                let habilidadesTexto = projeto.habilidades;
                let habilidadesDentroParenteses = habilidadesTexto.match(/\((.*?)\)/g);
                let habilidadesExtraidas = habilidadesDentroParenteses ? habilidadesDentroParenteses.map(
                    texto => texto.replace(/\(|\)/g, '')).join(", ") : "Nenhuma habilidade identificada";

                $(tabelaId).closest("table").show();
                $(tabelaId).append(`
            <tr>
                <td>${projeto.componente}</td>
                <td>${projeto.praticas_de_linguagem}</td>
                <td>${projeto.objetos_de_conhecimento}</td>
                <td>${projeto.habilidades}</td>
            </tr>
        `);

                let referenciaHtml = `
            <div class="border p-3 rounded bg-light mb-3">
                <div class="d-flex justify-content-between align-items-center">
                    <strong>Ano/Faixa:</strong> <span>${anoSelecionado}</span>
                    <strong>Unidade Temática:</strong> <span>${projeto.praticas_de_linguagem || 'Não informado'}</span>
                </div>
                <hr>
                <div class="mt-3">
                    <h5>Habilidades</h5>
                    <p>${habilidadesExtraidas}</p>
                </div>
                <div class="mt-3">
                    <h5>Objetos de Conhecimento</h5>
                    <p>${projeto.objetos_de_conhecimento}</p>
                </div>
                <div class="mt-3">
                    <h5>Comentário</h5>
                    <p>${projeto.comentario || 'Nenhum comentário disponível'}</p>
                </div>
                <div class="mt-3">
                    <h5>Possibilidades para o Currículo</h5>
                    <p>${projeto.possibilidades_para_o_curriculo || 'Nenhuma informação disponível'}</p>
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