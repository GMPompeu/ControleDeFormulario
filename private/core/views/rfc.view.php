<?php $this->view('includes/header'); ?>


<body>
    <div class="header" id="header">
        <button onclick="open_resp()" class="icon_btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" class="bi bi-list-task" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5V3a.5.5 0 0 0-.5-.5H2zM3 3H2v1h1V3z" />
                <path d="M5 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM5.5 7a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 4a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9z" />
                <path fill-rule="evenodd" d="M1.5 7a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5V7zM2 7h1v1H2V7zm0 3.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5H2zm1 .5H2v1h1v-1z" />
            </svg>
        </button>
        <div class="group_img">
            <div class="logo_ath">
                <img src="<?= ROOT ?>/assets/style/img/ath.png" class="ath" alt="Logo_Athens">
            </div>
            <div class="logo_spt">
                <img src="<?= ROOT ?>/assets/style/img/spt" class="spt" alt="Logo_Sptrans">
            </div>
            <div class="user_menu">
                <div class="dropdown2">
                    <button class="menu_user"><i class="bi bi-person-fill"></i>&nbsp;<?= Auth::user() ?>&nbsp;<b><i class="fa fa-angle-down"></i></b></button>
                    <div class="dropdown-content2">
                        <a href="alterarsenha">Alterar Senha</a>
                        <a href="<?= ROOT ?>/logout">Sair</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation_header" id="navigation_header">
            <button onclick="open_resp()" class="icon_btn">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" fill="currentColor" class="bi bi-box-arrow-in-up" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M3.5 10a.5.5 0 0 1-.5-.5v-8a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 .5.5v8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 0 0 1h2A1.5 1.5 0 0 0 14 9.5v-8A1.5 1.5 0 0 0 12.5 0h-9A1.5 1.5 0 0 0 2 1.5v8A1.5 1.5 0 0 0 3.5 11h2a.5.5 0 0 0 0-1h-2z" />
                    <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z" />
                </svg>
            </button>
            <a href="<?= ROOT ?>/formulario" class="go_form">Criar Formulário</a>
            <a href="<?= ROOT ?>/homeform" class="go_form">Voltar </a>
        </div>
    </div>

    <?php if ($error) { ?>
        <div class="notfound">
            <strong>ERROR!404</strong><br>
            <span>Certifique-se de que os dados foram enviados corretamente</span><br>
            <img src="<?= ROOT ?>/assets/style/img/robot.jpg" style=" height: 28vw;"><br>
            <strong><i class="bi bi-exclamation-diamond-fill"></i></strong>
            <a href="<?= ROOT ?>/homeform">Voltar para pagina Inicial</a>
            <br><strong><?= $error ?></strong>
        </div>

    <?php } else { ?>
        <div tabindex="0" onclick="close_menu()" class="content12" id="content">
            <main class="side_bara">
                <h2 class="rel">Relatório Fiscalização</h2>
                <div class="content_infoA">
                    <span><b>Unidade:</b>&nbsp;<?= $result[0]->UNIDADE ?> / </span>&nbsp;
                    <span><i class="bi bi-clipboard2-check" style="color:white; font-size:16px; padding:3px; background-color:green; border-radius: 4px; margin-right: 5px; "></i>RFC - <?= $result[0]->RFC ?></span>
                    <br><br>
                    <span><b>Data Criação:</b>&nbsp;<?= date("d/m/Y", strtotime($result[0]->DTA_CRIACAO)) ?></span>&nbsp;<span><b>às:</b>&nbsp;<?= date("H:i:s", strtotime($result[0]->DTA_CRIACAO)) ?></span>
                    <br><br>
                    <span><b>Relator:</b>&nbsp; <?= $result[0]->USUARIO_NOM ?></span>
                </div><br>
                <br>
                <div class="content_itemsA">
                    <button class="imprimir_form" id="imprimir_form"><i class="bi bi-printer-fill"></i>&nbsp;imprimir</button>
                    <button class="pdf_form" id="pdf_form"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp;Baixar PDF</button>
                    <hr class="line" style="margin-left: 14%;">
                </div>
                <div class="content_sideA" id="content_sideA">
                    <table id="table" class="container-table" cellspacing="0" cellpadding="5">
                        <tr>
 
                        <th class="margem" colspan="8">&nbsp;&nbsp;<img style=" width: 80px; height: 36px;" class="composicao" src="<?= ROOT ?>/assets/style/img/spt.png" alt="Logo_Sptrans"><b>Relatorio de fiscalização bilheterias</b></th>
                            <th class="ordem" colspan="2" id="idTable"><b>&nbsp;RFC - <?= $result[0]->RFC ?>&nbsp;</b></th>
                        </tr>
                        <th class="ordem" colspan="6">&nbsp;Posto:&nbsp;&nbsp;&nbsp;<?= $result[0]->UNIDADE ?></th>
                        <th class="ordem" colspan="4">&nbsp;Data Visita:&nbsp;<?= $result[0]->DTA_VISITA = implode("/", array_reverse(explode("-", $result[0]->DTA_VISITA))) ?></th><br>
                        <tr>
                            <th colspan="5" class="ordem">&nbsp;Horário Chegada:&nbsp;&nbsp;<?= date("H:i", strtotime($result[0]->HR_CHEGADA)) ?></th>
                            <th colspan="5" class="ordem">&nbsp;Horário Saída:&nbsp;&nbsp;<?= date("H:i", strtotime($result[0]->HR_SAIDA)) ?></th>
                        </tr>
                        <tr>

                            <th class="ind" colspan="10">Equipe de Trabalho</th>
                        </tr>
                        <tr>
                            <th colspan="4" class="ordem">&nbsp;Prontuário:&nbsp;&nbsp;&nbsp;<?= $result[0]->PRONT_ONE ?></th>
                            <th colspan="6" class="ordem" colspan="3">&nbsp;Nome:&nbsp;&nbsp;&nbsp;<?= $result[0]->NOM_ONE ?></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="ordem">&nbsp;Prontuário:&nbsp;&nbsp;&nbsp;<?= $result[0]->PRONT_TWO ?></th>
                            <th colspan="6" class="ordem" colspan="3">&nbsp;Nome:&nbsp;&nbsp;&nbsp;<?= $result[0]->NOM_TWO ?></th>
                        </tr>
                        <tr>
                            <th colspan="4" class="ordem">&nbsp;Prontuário:&nbsp;&nbsp;&nbsp;<?= $result[0]->PRONT_THREE ?></th>
                            <th colspan="6" class="ordem" colspan="3">&nbsp;Nome:&nbsp;&nbsp;&nbsp;<?= $result[0]->NOM_THREE ?></th>
                        </tr>
                        <tr>
                            <th class="ind" style="height: 8px;" colspan="10"></th>
                        </tr>
                        <tr>
                            <th class="ordem" colspan="8">&nbsp;Encarregado(a) Posto:&nbsp;<?= $result[0]->ENCARREGADO ?></th>
                            <th class="ordem" colspan="2">&nbsp;ID:&nbsp;&nbsp;<?= $result[0]->CHAPA ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="title">&nbsp;Recursos Humanos</th>
                            <th colspan="2" class="title">&nbsp;Atendentes</th>
                            <th colspan="2" class="title">&nbsp;Triagem</th>
                            <th colspan="3" class="title">&nbsp;Jovem Aprendiz</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="title">Total</th>
                            <th colspan="2" class="title"><?= $result[0]->ATENDENTES ?></th>
                            <th colspan="2" class="title"><?= $result[0]->TRIAGEM ?></th>
                            <th colspan="3" class="title"><?= $result[0]->J_APRENDIZ ?></th>
                        </tr>
                        <tr>
                            <th colspan="5" class="ordem">&nbsp;Uniforme:&nbsp;&nbsp;<?= $result[0]->UNIFORME ?></th>
                            <th colspan="5" class="ordem">&nbsp;Crachá:&nbsp;&nbsp;&nbsp;<?= $result[0]->CRACHA ?></th>
                        </tr>
                        <th colspan="10" class="ind" style="height: 8px;"></th>
                        <tr>
                            <th colspan="3" class="title"><b>Operação</b></th>
                            <th colspan="2" class="title">Total</th>
                            <th colspan="2" class="title">Ativos</th>
                            <th colspan="3" class="title">Inativos</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="title">Guichês</th>
                            <th colspan="2" class="title"><?= $result[0]->GUI_TOTAL ?></th>
                            <th colspan="2" class="title"><?= $result[0]->GUI_ATIVO ?></th>
                           <?php if($result[0]->GUI_INATIVO != 0)
                           {echo "<th colspan='3' class='negative'>". $result[0]->GUI_INATIVO. "</th>";}
                           else{
                            echo "<th colspan='3' class='title'>" .$result[0]->GUI_INATIVO. "</th>";
                           }
                           ?>
                        </tr>
                        <tr>
                            <th colspan="3" class="title">Triagem</th>
                            <th colspan="2" class="title"><?= $result[0]->TRI_TOTAL ?></th>
                            <th colspan="2" class="title"><?= $result[0]->TRI_ATIVO ?></th>
                            <?php if($result[0]->TRI_INATIVO != 0)
                           {echo "<th colspan='3' class='negative'>". $result[0]->TRI_INATIVO. "</th>";}
                           else{
                            echo "<th colspan='3' class='title'>" .$result[0]->TRI_INATIVO. "</th>";
                           }
                           ?>
                        </tr>
                        <tr>
                            <th colspan="3" class="title">Tablet</th>
                            <th colspan="2" class="title"><?= $result[0]->TB_TOTAL ?></th>
                            <th colspan="2" class="title"><?= $result[0]->TB_ATIVO ?></th>
                            <?php if($result[0]->TB_INATIVO != 0)
                           {echo "<th colspan='3' class='negative'>". $result[0]->TB_INATIVO. "</th>";}
                           else{
                            echo "<th colspan='3' class='title'>" .$result[0]->TB_INATIVO. "</th>";
                           }
                           ?>
                        </tr>
                        <th colspan="10" class="ind" style="height: 0.5;">Fechamento do Posto</th>
                        <tr>
                            <th colspan="3" class="fechamento">Tipo</th>
                            <th colspan="1" class="fechamento">Guichês</th>
                            <th colspan="1" class="fechamento">Pastas</th>
                            <th colspan="1" class="fechamento">Cofre</th>
                            <th colspan="2" class="fechamento">Sistema</th>
                            <th colspan="2" class="fechamento">Diferença</th>
                        </tr>
                        <tr>
                            <th colspan="3" class="fechamento">Prata 4k</th>
                            <th colspan="1" class="fechamento"><?= $pratagui ?></th>
                            <th colspan="1" class="fechamento"><?= $pastas[0]->PRATA_PASTA ?></th>
                            <th colspan="1" class="fechamento"><?= $cofre[0]->COF_PRATA ?></th>
                            <th colspan="2" class="fechamento"><?= $result[0]->SIS_PRATA ?></th>
                            <?php
                            if ($diferencaPrata != 0) {
                                echo "<th colspan='2' class='negative'>";
                                echo "<span class='negativetxt'>" . $diferencaPrata . "</span></th>";
                            } else {
                                echo "<th colspan='2'>";
                                echo $diferencaPrata;
                            }
                            ?>

                        </tr>
                        <tr>
                            <th colspan="3" class="fechamento">Estudantes</th>
                            <th colspan="1" class="fechamento"><?= $estudantegui ?></th>
                            <th colspan="1" class="fechamento"><?= $pastas[0]->ESTD_PASTA ?></th>
                            <th colspan="1" class="fechamento"><?= $cofre[0]->COF_ESTD ?></th>
                            <th colspan="2" class="fechamento"><?= $result[0]->SIS_ESTD ?></th>
                            <?php
                             if ($diferencaEstd != 0) {
                                 echo "<th colspan='2' class='negative'>";
                                 echo "<span class='negativetxt'>" . $diferencaEstd . "</span></th>";
                             } else {
                                 echo "<th colspan='2'>";
                                 echo $diferencaEstd;
                             }
                            ?>
                        </tr>
                        <tr>
                            <th colspan="5" class="fechamento">Bilhetes Devolvidos</th>
                            <th class="fechamento"><?= $cofre[0]->COF_DEVOLVIDOS?></th>
                            <th colspan="2" class="fechamento"><?= $result[0]->SIS_DEVOL ?></th>
                            <?php
                             if ($diferencaDevol != 0) {
                                 echo "<th colspan='2' class='negative'>";
                                 echo "<span class='negativetxt'>" . $diferencaDevol . "</span></th>";
                             } else {
                                 echo "<th colspan='2'>";
                                 echo $diferencaDevol;
                             }
                            ?>

                        </tr>
                        <tr>
                            <th colspan="10" class="ind" style="height: 8px;"></th>
                        </tr>
                        <tr>
                            <th colspan="5" class="dinheiro">Origem</th>
                            <th colspan="5" class="dinheiro">Totais</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="dinheiro">Apurado</th>
                            <th colspan="5" class="dinheiro">R$<?= number_format($total, 2,',','.') ?></th>
                        </tr>
                        <tr>
                            <th colspan="5" class="dinheiro">Contado</th>
                            <th colspan="5" class="dinheiro">R$ <?=number_format($result[0]->CONTADO, 2,',','.')?></th>
                        </tr>
                        <tr>
                            <th colspan="5" class="dinheiro">Diferença</th>
                            <?php
                             if ($diferenca < 0) {
                                 echo "<th colspan='5' class='negative'>R$&nbsp;";
                                 echo "<span class='negativetxt'>" . number_format($diferenca, 2, ',', '.') . "</span></th>";
                             } else {
                                 echo "<th colspan='5' class='positive'>R$&nbsp;";
                                 echo "<span class='positive'>" . number_format($diferenca, 2, ',', '.') . "</span></th>";
                             }
                            ?>
                            </th>
                        <tr>
                            <th colspan="10" class="ind" style="height: 8px;">Responsavel Guichê</th>
                        </tr>
                        <tr>
                            <th colspan="5" class="dinheiro"></th>
                            <th colspan="5" class="dinheiro"></th>
                        </tr>
                        <tr>
                            <th colspan="2" class="dinheiro">&nbsp;&nbsp;Impacto Operação
                            <th colspan="3" class="ordem">Chamado: <?= $result[0]->NUM_CHAMADO?>
                            <th colspan="3" class="ordem">Equipamento: <?= $result[0]->EQUIPAMENTOS?>
                            <th colspan="2" class="ordem">Tempo: <?=$result[0]->TEMPO ?>
                        </tr>
                        </tr>
                        <tr>
                            <th colspan="10" class="ind" style="height: 8px;"></th>
                        </tr>
                        <th class="fechamento" style="height: 100px;" colspan="10"></th>
                        </tr>
                    </table>
                </div>
            </main>
            <aside class="side_barb">
                <div class="content_sideB">
                    <h1 class="tituloB">Acompanhamento Relatório</h1>
                    <br>
                    <div class="fild_sideB">
                        <div class="respostas">
                            <?php if (count($errorAcess) > 0) : ?>

                                <div class="alertlogin" role="alert">
                                    <?php foreach ($errorAcess as $errorAcess) : ?>
                                        <strong><?= $errorAcess ?></strong>

                                    <?php endforeach; ?>
                                </div>

                            <?php endif; ?>
                            <fieldset>
                                <br>
                                &nbsp;&nbsp;<span><b>Status:</b></span>&nbsp;
                                <?php
                                if ($result[0]->NOM_STATUS == 'CONCLUIDO') {
                                    echo "<button class='conc2' id='opensts'>" . $result[0]->NOM_STATUS . "&nbsp;&nbsp;</button>";
                                } else {
                                    echo "<button class='opensts' id='opensts'>" . $result[0]->NOM_STATUS . "&nbsp;&nbsp;</button>";
                                }
                                ?>
                                <div class="container-drop" id="container-drop">
                                    <div class="drop-values" id="drop-values">
                                        <ul>
                                            <?php
                                            if ($result[0]->NOM_STATUS == 'CONCLUIDO') {
                                                echo "<br>";
                                                echo "<a class='select-aguard' onclick='abrirAguard()' id='pop-aguard'>AGUARDANDO TERCEIRO</a>";
                                                echo "<br>";
                                                echo "<a class='select-atendimento' onclick='abrirAtend()' id='pop-ematend'>EM ATENDIMENTO</a>";
                                                echo "<br>";
                                            } elseif ($result[0]->NOM_STATUS == 'ABERTO') {
                                                echo "<br>";
                                                echo "<a class='select-aguard' onclick='abrirAguard()' id='pop-aguard'>AGUARDANDO TERCEIRO</a>";
                                                echo "<br>";
                                                echo "<a class='conc' onclick='abrirPopup()'>CONCLUIDO</a>";
                                                echo "<br>";
                                                echo "<a class='select-atendimento' onclick='abrirAtend()' id='pop-ematend'>EM ATENDIMENTO</a>";
                                                echo "<br>";
                                            } elseif ($result[0]->NOM_STATUS == 'EM ATENDIMENTO') {
                                                echo "<br>";
                                                echo "<a class='select-aguard' onclick='abrirAguard()' id='pop-aguard'>AGUARDANDO TERCEIRO</a>";
                                                echo "<br>";
                                                echo "<a class='conc' onclick='abrirPopup()'>CONCLUIDO</a>";
                                                echo "<br>";
                                            } elseif ($result[0]->NOM_STATUS == 'AGUARDANDO TERCEIRO') {
                                                echo "<br>";
                                                echo "<a class='conc'onclick='abrirPopup()'>CONCLUIDO</a>";
                                                echo "<br>";
                                                echo "<a class='select-atendimento' onclick='abrirAtend()' id='pop-ematend'>EM ATENDIMENTO</a>";
                                                echo "<br>";
                                            }
                                            ?>
                                        </ul>

                                        <script>
                                            // ----------------------------------------------Abrir Menu Status-------------------------------------------------
                                            var button = document.getElementById("opensts");
                                            var dropdown = document.getElementById("drop-values");

                                            button.addEventListener("click", function() {
                                                dropdown.classList.toggle("open");
                                            });

                                            window.addEventListener("click", function(event) {
                                                if (!event.target.matches("#opensts")) {
                                                    dropdown.classList.remove("open");
                                                }
                                            });
                                        </script>
                                    </div>
                                </div>
                                <br>
                            </fieldset>
                        </div>
                        <?php if (count($errorConf) > 0) : ?>
                            <div class="alertlogin" role="alert">
                                <?php foreach ($errorConf as $errorConf) : ?>
                                    <strong><?= $errorConf ?></strong>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                        <br>
                        <fieldset>
                            <br>
                            &nbsp;&nbsp;<span><b>Avaliação Final - [SPTrans]</b></span>
                            <br><br>
                            &nbsp;&nbsp;<span><b>DG/SAC</b></span>&nbsp;
                            <button class='opensts' id='respspt'><?= $result[0]->NOM_RESP ?></button>
                            <div class="container-resp">
                                <div class="drop-resp" id="drop-resp">
                                    <ul>
                                        <?php
                                        if ($result[0]->NOM_RESP == 'INDEFINIDO') {
                                            echo "<br>";
                                            echo "<a class='select-aguard' onclick='abrirNconf() ' id='pop-aguard'>NAO CONFORME</a>";
                                            echo "<br>";
                                            echo "<a class='select-atendimento' onclick='abrirconf()' id='pop-ematend'>CONFORME</a>";
                                            echo "<br>";
                                        } elseif ($result[0]->NOM_RESP == 'NAO CONFORME') {
                                            echo "<br>";
                                            echo "<a class='select-aguard' onclick='abrirIndf()' id='pop-aguard'>INDEFINIDO</a>";
                                            echo "<br>";
                                            echo "<a class='select-atendimento' onclick='abrirconf()' id='pop-ematend'>CONFORME</a>";
                                            echo "<br>";
                                        } elseif ($result[0]->NOM_RESP == 'CONFORME') {
                                            echo "<br>";
                                            echo "<a class='select-aguard' onclick='abrirIndf()' id='pop-aguard'>INDEFINIDO</a>";
                                            echo "<br>";
                                            echo "<a class='select-atendimento' onclick='abrirNconf()' id='pop-ematend'>NAO CONFORME</a>";
                                            echo "<br>";
                                        }
                                        ?>
                                    </ul>
                                    <script>
                                        var btnresp = document.getElementById("respspt");
                                        var dropresp = document.getElementById("drop-resp");

                                        btnresp.addEventListener("click", function() {
                                            dropresp.classList.toggle("open");
                                        });

                                        window.addEventListener("click", function(event) {
                                            if (!event.target.matches("#respspt")) {
                                                dropresp.classList.remove("open");
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                            <br><br>
                            <textarea readonly="readonly" class="desc_spt" name="desc_fisc" id="desc_fisc" rows="5"><?= $result[0]->RESP_FINAL ?></textarea>
                            <br><br>
                        </fieldset>
                        <br>
                        <hr>
                        &nbsp;&nbsp;<span><b>Descrição Fiscal - [SPTrans]</b></span>
                        <br><br>
                        <textarea readonly="readonly" class="desc_fisc" name="desc_fisc" id="desc_fisc" rows="15"><?= $result[0]->COMENTSPT ?></textarea>
                        <br>
                        <hr>
                        &nbsp;&nbsp;<span><b>Resposta DGQ - [Athens]</b></span>
                        <br><br>
                        <textarea readonly="readonly" class="text-DGQ" name="text-DGQ" id="desc_fisc" rows="15"><?= $result[0]->COMENTDGQ ?></textarea>
                    </div>

                </div>

            </aside>

        </div>
        <div class="container-pop-concluido" id="container-pop-concluido">
            <div class="pop-conc">
                <form method="POST" action="">
                    <h3 class="comentConc">Concluir</h3>
                    <input type="hidden" name="concluir" value="2">
                    <br><br>
                    <label class="label-satisfy" for="text-satisfy"><b>Resposta DGQ*</b></label>
                    <hr>
                    <textarea name="respDGQ" class="resp-DGQ" rows="10" cols="80" style="resize: none;" placeholder="Digite aqui" required></textarea>
                    <br><br>
                    <button type="submit" class='concluirpop' id='concluirpop'><b>Concluir</b></button>
                    <a class="restpopCancelar" onclick="closeConc()">Cancelar</a>
                </form>
            </div>
        </div>
        <div class="container-pop-atend" id="container-pop-atend">
            <div class="pop-atend">
                <form method="POST" action="">
                    <h3 class="comentConc">Em Atendimento ?</h3>
                    <input type="hidden" name="atendimento" value="3">
                    <hr>
                    <br>
                    <br><br>
                    <button type="submit" class='restpop' id='restpop'><b>Em Atendimento </b></button>
                    <a class="restpopCancelar" onclick="closeAtend()" id="restpopCancelar">Cancelar</a>
                </form>
            </div>
        </div>
        <div class="container-pop-aguard" id="container-pop-aguard">
            <div class="pop-aguard">
                <form method="POST" action="">
                    <h3 class="comentConc">Aguardando Terceiro ?</h3>
                    <input type="hidden" name="aguardando" value="4">
                    <hr>
                    <br>
                    <br><br>
                    <button type="submit" class='restpop' id='restpop'><b>Aguardando Terceiro</b></button>
                    <a class="restpopCancelar" onclick=" closeAguard()" id="restpopCancelar">Cancelar</a>
                </form>
            </div>
        </div>
        <div class="container-naoconf " id="container-naoconf">
            <div class="pop-naoconf">
                <form action=" " method="POST">
                    <h3 class="comentConc">Não Conforme?</h3>
                    <input type="hidden" name="naoconf" value="3">
                    <br><br>
                    <label class="label-satisfy" for="respSPT"><b>Pontuar Itens*</b></label>
                    <hr>
                    <div class="check_itens">
                        <input type="checkbox" value="1" class="item1" name="chamado">Chamado
                        <input type="checkbox" value="1" class="item1" name="cracha">Cracha
                        <input type="checkbox" value="1" class="item1" name="devol">Devolvidos
                    </div>
                    <div class="check_itens2">
                        <br>
                        <input type="checkbox" value="1" class="item2" name="estudante">Estudante
                        <input type="checkbox" value="1" class="item2" name="prata4k">Prata4k
                        <input type="checkbox" value="1" class="item2" name="totaldif">Total Diferença
                    </div>
                    <hr>
                    <label class="label-satisfy" for="respSPT"><b>Resposta SPTrans*</b></label>
                    <textarea name="respSPT" class="resp-DGQ" rows="10" cols="80" style="resize: none;" placeholder="Digite aqui" required></textarea>
                    <br><br>
                    <button name='concluirpop' type="submit" class='concluirpop' id='concluirpop'><b>Enviar</b></button>
                    <a class="restpopCancelar" onclick=" closeNconf()">Cancelar</a>
                </form>
            </div>
        </div>
        <div class="container-conf" id="container-conf">
            <div class="pop-conf">
                <form action="" method="POST">
                    <h3 class="comentConc">Conforme?</h3>
                    <input type="hidden" name="conf" value="2">
                    <hr>
                    <br>
                    <br><br><br>
                    <button name='concluirpop' type="submit" class='restpop' id='concluirpop'><b>Conforme</b></button>
                    <a class="restpopCancelar" onclick=" closeconfig()">Cancelar</a>
                </form>
            </div>
        </div>
        <div class="container-indf" id="container-indf">
            <div class="pop-indf">
                <form action="" method="POST">
                    <h3 class="comentConc">Indefinido?</h3>
                    <input type="hidden" name="indefinido" value="1">
                    <hr>
                    <br>
                    <br><br><br>
                    <button name='concluirpop' type="submit" class='restpop' id='concluirpop'><b>Indefinido</b></button>
                    <a class="restpopCancelar" onclick=" closeconf()">Cancelar</a>
                </form>
            </div>
        </div>
    <?php } ?>
</body>

</html>


<script>
    var header = document.getElementById('header');
    var navigation_header = document.getElementById('navigation_header');
    var content = document.getElementById('content');
    var showSidebar = false;

    function open_resp() {
        showSidebar = !showSidebar;
        if (showSidebar) {
            navigation_header.style.marginLeft = '-10vw';
            navigation_header.style.animationName = 'showSidebar';
            content.style.filter = 'blur(2px)';
        } else {
            navigation_header.style.marginLeft = '-100vw';
            navigation_header.style.animationName = '';
            content.style.filter = '';
        }
    }

    function close_menu() {
        if (showSidebar) {
            open_resp();
        }
    }
    window.addEventListener('resize', function(evet) {
        if (window.innerWidth > 768 && showSidebar) {
            open_resp();
        }
    });

    //-------------------------Arquivo Para Impressão---------------------------------
    const btn_download = document.getElementById("imprimir_form")

    btn_download.addEventListener("click", (evt) => {
        //conteudo html da tabela
        const content = document.getElementById('content_sideA').innerHTML

        let estilo = "<style>";
        estilo += "table {width: 100%;height: 1000px;}";
        estilo += "table, th, td {overflow: hidden;text-overflow: ellipsis;border: 0.5px solid grey;}"
        estilo += "body {font-family: Arial, Helvetica, sans-serif;}"
        estilo += ".ordem {text-align: left; height: 25;font-size: 12px;}"
        estilo += ".ind {font-size: 14px;height: 2;text-align: center;background-color: rgb(206, 206, 206);}"
        estilo += ".title {text-align: center; height: 25;font-size: 12px;}"
        estilo += ".fechamento {align-items: center; height: 25;font-size: 12px;}"
        estilo += ".dinheiro {align-items: center;height: 25;font-size: 12px;}"
        estilo += "</style>";

        const win = window.open('', '', 'height=1122px,width=793px')

        win.document.write('<html><head>')
        win.document.write(estilo)
        win.document.write('</head>')
        win.document.write('<body>')
        win.document.write(content)
        win.document.write('</body></html>')


        win.print();
    })

    //-------------------------Arquivo Para PDF---------------------------------
    const btn_pdf = document.getElementById("pdf_form")

    btn_pdf.addEventListener("click", (evt) => {
        //conteudo html da tabela
        const contentPdf = document.getElementById('content_sideA').innerHTML
        //config Documento
        const config_pdf = {
            margin: [5, 5, 5, 5],
            filename: "Formulário FiscalizaçãoRFC<?= $result[0]->RFC ?>",
            html2canvas: {
                scale: 1
            },
            jsPDF: {
                unit: "mm",
                format: "a4"
            }
        }

        html2pdf().set(config_pdf).from(contentPdf).save();


    })
</script>
<?php $this->view('includes/footer'); ?>