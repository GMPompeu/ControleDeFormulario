<?php $this->view('includes/header'); ?>
<div class="topbar">
    <div class="logo">
        <img src="<?= ROOT ?>/assets/style/img/ath.png" class="ath1">
    </div>
    <div class="filter-dropdown">
        <button id="filterButton" onclick="toggleFilterDropdown()"><i class="bi bi-calendar-event"></i> Selecione uma data <i class="bi bi-chevron-down"></i></button>
        <form method="GET" action="">
            <div id="filterOptions" class="filter-options">
                <div class="date-options">
                    <label for="startDate">Data Inicial:</label>
                    <input type="date" name="dateInity" id="startDate">
                    <label for="endDate">Data Final:</label>
                    <input type="date" name="dateEnd" id="endDate">
                </div>
                <div class="month-option">
                    <label for="monthSelect">Seleção de meses:</label>
                    <select id="monthSelect" name="monthSelect">
                        <option value="sem valor" disabled selected>Selecione o mês</option>
                        <option value="01">Janeiro</option>
                        <option value="02">Fevereiro</option>
                        <option value="03">Março</option>
                        <option value="04">Abril</option>
                        <option value="05">Maio</option>
                        <option value="06">Junho</option>
                        <option value="07">Julho</option>
                        <option value="08">Agosto</option>
                        <option value="09">Setembro</option>
                        <option value="10">Outubro</option>
                        <option value="11">Novembro</option>
                        <option value="12">Dezembro</option>
                    </select>
                </div>
                <div class="apply-btn">
                    <button onclick="applyFilter()" type='submit'>Aplicar Filtro</button><br><br>
                    <a href="dashboard?monthSelect=<?= $dta ?>" class="go_form">Limpar</a>
                </div>
        </form>
    </div>
</div>
<a href='homeform' class='go_form'><i class='bi bi-house-door-fill'></i> Início</a>
</div>
<div class="sidebar">
    <ul>

    </ul>
</div>
<div class="main">
    <?php if ($error) { ?>
        <div class="notfound">
            <strong>Dados não encontrados</strong><br>
            <span>Certifique-se de que os dados foram enviados corretamente</span><br>
            <img src="<?= ROOT ?>/assets/style/img/robot.jpg" style=" height: 28vw;"><br>
            <strong><i class="bi bi-exclamation-diamond-fill"></i></strong>
            <a href="<?= ROOT ?>/dashboard?monthSelect=<?= $dta ?>">Voltar a pesquisa</a>
            <br><strong><?= $error ?></strong>
        </div>

    <?php } else { ?>
        <?php if (Auth::acess() == 3) { ?>
            <div class="cards">
                <div class="card">
                    <div class="card-content">
                        <div class="number">R$ <?= isset($diferenca[0]->DIFERENCA) ? number_format($diferenca[0]->DIFERENCA, 2, ',', '.') : '0,00' ?></div>
                        <div class="card-name">Diferença</div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-dollar-sign"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">R$ <?= isset($crachaglosa) ? number_format($crachaglosa, 2, ',', '.') : '0,00' ?></div>
                        <div class="card-name">Crachá: <?= isset($cracha[0]->DIF_CRACHA) ? $cracha[0]->DIF_CRACHA : 0  ?></div>
                    </div>
                    <div class="icon-box">
                        <i class="fas fa-id-card-alt"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">R$ <?= isset($prata4kglosa) ? number_format($prata4kglosa, 2, ',', '.') : '0,00' ?></div>
                        <div class="card-name">Prata4k: <?= isset($prata4k[0]->DIF_PRATA) ? $prata4k[0]->DIF_PRATA : 0 ?></div>
                    </div>
                    <div class="icon-box">
                        <i class="far fa-credit-card"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-content">
                        <div class="number">R$ <?= isset($estudanteglosa) ? number_format($estudanteglosa, 2, ',', '.') : '0,00' ?></div>
                        <div class="card-name">Estudante: <?= isset($estudante[0]->DIF_ESTD) ? $estudante[0]->DIF_ESTD : 0 ?></div>
                    </div>
                    <div class="icon-box">
                        <i class="far fa-address-card"></i>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="charts">
            <div class="chart">
                <h2>Relatórios por Posto</h2>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(draw);

                    function draw() {
                        var data = google.visualization.arrayToDataTable([
                            ['Posto', 'RFC', 'Diferença', 'Crachá', 'Prata4k', 'Estudante'],
                            <?php
                            $postoData = array(); // Array para armazenar os dados agrupados por posto
                            foreach ($rfc as $rfc1) {
                                $posto = $rfc1->UNIDADE;
                                $diferenca = ($rfc1->SOMA_DIFERENCA) ? $rfc1->SOMA_DIFERENCA : 0;
                                $cracha = ($rfc1->SOMA_DIF_CRACHA) ? $rfc1->SOMA_DIF_CRACHA : 0;
                                $pt4k = ($rfc1->SOMA_DIF_PRATA) ? $rfc1->SOMA_DIF_PRATA : 0;
                                $estd = ($rfc1->SOMA_DIF_ESTD) ? $rfc1->SOMA_DIF_ESTD : 0;

                                // Verifica se o posto já existe no array de dados agrupados
                                if (array_key_exists($posto, $postoData)) {
                                    // Se existir, soma os valores nas respectivas colunas
                                    $postoData[$posto]['Diferença'] += $diferenca;
                                    $postoData[$posto]['Crachá'] += $cracha;
                                    $postoData[$posto]['Prata4k'] += $pt4k;
                                    $postoData[$posto]['Estudante'] += $estd;
                                    $postoData[$posto]['RFC']++;
                                } else {
                                    // Caso contrário, cria uma entrada para o posto no array
                                    $postoData[$posto] = array(
                                        'RFC' => 1,
                                        'Diferença' => $diferenca,
                                        'Crachá' => $cracha,
                                        'Prata4k' => $pt4k,
                                        'Estudante' => $estd
                                    );
                                }
                            }

                            // Agora, vamos percorrer o array agrupado para criar a string de dados do gráfico
                            foreach ($postoData as $posto => $values) {
                                echo "['" . $posto . "', " . $values['RFC'] . "," . $values['Diferença'] . ", " . $values['Crachá'] . ", " . $values['Prata4k'] . ", " . $values['Estudante'] . "],";
                            }
                            ?>

                        ]);

                        var options = {
                            legend: {
                                position: 'left'
                            },
                            colors: ['black'],
                            lineWidth: 3,
                            vAxis: {
                                minValue: 0,
                                format: '#,###',
                                gridlines: {
                                    color: 'transparent'
                                }
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>
                <div id="columnchart_material" style="width: 700px; height: 180px;"></div>
            </div>
            <div class="doughnut">
                <div class="chart" id="doughnut-chart">
                    <h2>Status</h2>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['Task', 'Hours per Day'],
                                ['Aberto', <?= $aberto ?>],
                                ['Aguardando Terceiros', <?= $aguard ?>],
                                ['Concluido', <?= $conc ?>],
                                ['Em Atendimento', <?= $atend ?>]

                            ]);

                            var options = {
                                title: 'Quantidade Total',
                                pieHole: 0.4,
                                colors: ['grey', 'darkgray', 'green', 'black'],
                                pieSliceText: 'value' // adiciona esta linha para mostrar o valor numérico
                            };

                            var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
                            chart.draw(data, options);
                        }
                    </script>
                    </head>

                    <body>
                        <div id="donutchart" style="width:320px; height: 200px;"></div>
                    </body>

                    </html>
                </div>
            </div>
        </div>
        <div class="chart-posto" id="chart-details">
            <div class="content-posto">
                <h2>Relátorio por Mês</h2>
                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Mês', 'Total'],

                            ['Jan', <?= $meses['Jan'] ?>],
                            ['Fev', <?= $meses['Feb'] ?>],
                            ['Mar', <?= $meses['Mar'] ?>],
                            ['Abr', <?= $meses['Apr'] ?>],
                            ['Mai', <?= $meses['May'] ?>],
                            ['Jun', <?= $meses['Jun'] ?>],
                            ['Jul', <?= $meses['Jul'] ?>],
                            ['Ago', <?= $meses['Aug'] ?>],
                            ['Set', <?= $meses['Sep'] ?>],
                            ['Out', <?= $meses['Oct'] ?>],
                            ['Nov', <?= $meses['Nov'] ?>],
                            ['Dez', <?= $meses['Dec'] ?>]
                        ]);

                        var options = {
                            legend: {
                                position: 'bottom'
                            },
                            colors: ['black'],
                            lineWidth: 3,
                            vAxis: {
                                minValue: 0,
                                format: '#,###',
                                gridlines: {
                                    color: 'transparent'
                                }
                            }
                        };

                        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
                        chart.draw(data, options);
                    }
                </script>

                <div id="chart_div" style="width: 980px; height: 200px"></div>
            </div>
        </div>
        <div class="chart-posto">
            <div class="content-posto">
                <div class="table_resum">
                    <h2>Resumo Geral</h2>
                    <table class="resum responsive-table">
                        <thead>
                            <tr>
                                <th style="width:70px" class="identificador">Chave</th>
                                <th style="width:100px" class="uni">Unidade</th>
                                <th style="width: 100px;" class="uni">Status</th>
                                <th style="max-width:80px" class="uni">[AGQ-ATHENS]</th>
                                <th style="width:80px;" class="uni">Data</th>
                                <th style="width:80px" class="uni">DG/SAC</th>
                                <th style="max-width:70px" class="uni">Resumo[DG/SAC]</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($rfc == true) {
                                foreach ($rfc as $data) {
                                    // Código HTML para exibir os resultados
                                    echo "<tr>";
                                    echo "<td class='colum_one'>RFC -" . $data->RFC . "</td>";
                                    echo "<td class='uni'><a class='link_view' href='rfc?id=" . $data->RFC . "'>" . $data->UNIDADE . "</a></td>";
                                    echo "<td class='uni'>" . $data->NOM_STATUS . "</td>";
                                    echo "<td class=uni>" . $data->COMENTDGQ . "</td>";
                                    echo "<td class='uni'>" . date("d/m/Y", strtotime($data->DTA_CRIACAO)) . "</td>";
                                    echo "<td class='uni'>" . $data->NOM_RESP . "</td>";
                                    echo "<td class='uni'>" . $data->RESP_FINAL . "</td>";
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php } ?>
</div>


<script>
    const filterButton = document.getElementById("filterButton");
    const filterOptions = document.getElementById("filterOptions");

    function toggleFilterDropdown() {
        if (filterOptions.style.display === "none") {
            filterOptions.style.display = "block";
        } else {
            filterOptions.style.display = "none";
        }
    }

    // Fechar o dropdown quando o usuário clicar fora dele
    window.addEventListener("click", function(event) {
        if (!filterButton.contains(event.target) && !filterOptions.contains(event.target)) {
            filterOptions.style.display = "none";
        }
    });
</script>
<?php $this->view('includes/footer'); ?>