<?php $this->view('includes/header'); ?>

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
            <img src="<?= ROOT ?>/assets/style/img/spt.png" class="spt" alt="Logo_Sptrans">
        </div>
        <div class="user_menu">
            <div class="dropdown2">
                <button class="menu_user"><i class="bi bi-person-fill"></i>&nbsp;<?= Auth::user() ?>&nbsp;<b><i class="fa fa-angle-down"></i></b></button>
                <div class="dropdown-content2">
                    <a href="#">Alterar Senha</a>
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
        <a href="homeform" class="run">Voltar </a>
    </div>
</div>
<form method="POST">
    <div tabindex="0" onclick="close_menu()" class="content" id="content">
        <div class="container">
            <div class="formulario">
                <legend><b>Formulário de Fiscalização</b></legend>
                <div class="inputBox2">
                    <label for="posto"><b>Posto</b></label>
                    <select name="unidades" class="selecao" id="unidades">
                        <option value=""></option>
                        <option value="AE CARVALHO">AE CARVALHO</option>
                        <option value="AGUA ESPRAIADA">AGUA ESPRAIADA</option>
                        <option value="AMARAL GURGEL">AMARAL GURGEL</option>
                        <option value="JARDIM ANGELA">JARDIM ANGELA</option>
                        <option value="ARICANDUVA">ARICANDUVA</option>
                        <option value="BANDEIRA">BANDEIRA</option>
                        <option value="CACHOEIRINHA">CACHOEIRINHA</option>
                        <option value="CAMPO LIMPO">CAMPO LIMPO</option>
                        <option value="CAPELINHA">CAPELINHA</option>
                        <option value="CARRÃO">CARRÃO</option>
                        <option value="CASA VERDE">CASA VERDE</option>
                        <option value="CIDADE TIRADENTES">CIDADE TIRADENTES</option>
                        <option value="GRAJAU">GRAJAU</option>
                        <option value="GUARAPIRANGA">GUARAPIRANGA</option>
                        <option value="JOÂO DIAS">JOÂO DIAS</option>
                        <option value="LAPA">LAPA</option>
                        <option value="MERCADO">MERCADO</option>
                        <option value="PARELHEIROS">PARELHEIROS</option>
                        <option value="PENHA">PENHA</option>
                        <option value="PIRITUBA">PIRITUBA</option>
                        <option value="PARQUE DOM PEDRO">PARQUE DOM PEDRO</option>
                        <option value="PRINCESA ISABEL">PRINCESA ISABEL</option>
                        <option value="SACOMA">SACOMÂ</option>
                        <option value="SANTO AMARO">SANTO AMARO</option>
                        <option value="SAO MIGUEL">SÃO MIGUEL</option>
                        <option value="SAPOPEMBA">SAPOPEMBA</option>
                        <option value="VARGINHA">VARGINHA</option>
                        <option value="VILA PRUDENTE">VILA PRUDENTE</option>
                        <output value="PINHEIROS">PINHEIROS</output>
                        <option value="PARADA ANA NERI">PARADA ANA NERI</option>
                        <option value="PARADA C.ATLETICO YPYRANGA">PARADA C.ATLETICO YPYRANGA</option>
                        <option value="PARADA DOM PEDROII">PARADA DOM PEDROII</option>
                        <option value="ALBERTO LION">ALBERTO LION</option>
                        <option value="PARADA GRITO">PARADA GRITO</option>
                        <option value="PARADA NSA.APARECIDA">PARADA NSA.APARECIDA</option>
                        <option value="JABAQUARA">JABAQUARA</option>
                        <option value="CENTRAL">CENTRAL</option>
                        <option value="RECEBEDORIA LAPA">RECEBEDORIA LAPA</option>
                        <option value="RECEBEDORIA SACOMÃ">RECEBEDORIA SACOMÃ</option>
                        <option value="RECEBEDORIA SAPOPEMBA">RECEBEDORIA SAPOPEMBA</option>
                        <option value="RECEBEDORIA GRAJAU">RECEBEDORIA GRAJAU</option>
                        <option value="RECEBEDORIA VARGINHA">RECEBEDORIA VARGINHA</option>
                    </select>
                </div>
                <div class="inputBox2">
                    <div>
                        <label for="dataVisita"><b>Data da Visita:</b></label>
                        <input type="date" name="dataVisita" id="data" class="obrigatorio" min="2023-01-01" max="2033-12-31">
                        &nbsp;&nbsp;
                        <label for="hrChegada"><b>Horário Chegada:</b></label>
                        <input type="time" class="obrigatorio" name="hrChegada" id="hr" min="06:00" max="22:00">
                    </div>
                </div>
                <legend><b>Equipe de Trabalho</b></legend>
                <div class="inputBox2">
                    <div>
                        <label for="firstPront"><b>Prontuário:</b></label>
                        <input type="text" name="firstPront" id="prontuario" class="obrigatorio" max="10" size="10">
                    </div>
                    <div>
                        <label for="secondPront"><b>Prontuário:</b></label>
                        <input type="text" name="secondPront" id="prontuario" class="inputUser" max="10" size="10">
                    </div>
                    <div>
                        <label for="thirdPront"><b>Prontuário:</b></label>
                        <input type="text" name="thirdPront" id="prontuario" class="inputUser" max="10" size="10">
                    </div>
                </div>
            </div>
            <legend><b>Guichês - Dinheiro</b></legend>
            <div class="inputBox2">
                <div id="conjunto-campos" class="conjunto-campos">
                    <div>
                        <label><b>Prata</b></label>
                        <input type="number" name="din_prata_apurado[]" id="apurado1" min="0" class="obrigatorio">
                    </div>
                    <div>
                        <label><b>Estudante</b></label>
                        <input type="number" name="din_estudante_apurado[]" id="apurado" min="0" class="obrigatorio">
                    </div>
                    <div>
                        <label><b>Prata Personalizado</b></label>
                        <input type="number" name="din_prata_personalizado[]" id="perso" min="0" class="obrigatorio">
                        <label><b>Estudante Personalizado</b></label>
                        <input type="number" name="din_estudante_personalizado[]" id="perso" min="0" class="obrigatorio">
                    </div>
                    <div>
                        <label><b>Comum R$</b></label>
                        <input type="number" name="din_comum[]" id="values" step="0.01" min="0.01" class="obrigatorio">
                        <label><b>Escolar R$</b></label>
                        <input type="number" name="din_escolar[]" id="values" step="0.01" min="0.01" class="obrigatorio">
                        <label><b>Fidelidade R$</b></label>
                        <input type="number" name="din_fidelidade[]" id="values" step="0.01" min="0.01" class="obrigatorio">
                    </div>
                    <div>
                        <label><b>Tx.Comum</b></label>
                        <input type="number" name="din_txcomum[]" id="tx" min="0" class="obrigatorio">
                        <label><b>Tx.Estudante</b></label>
                        <input type="number" name="din_txestudante[]" id="tx" min="0" class="obrigatorio">
                        <label><b>Contado R$</b></label>
                        <input type="number" name="din_contado[]" id="tx" step="0.01" min="0.01" class="obrigatorio">
                    </div>
                    <hr>
                    <div>
                        <label for="funcionario"><b>Nome do Funcionário:</b></label>
                        <input type="text" name="din_funcionario[]" id="funcionario" class="obrigatorio" size="25">
                        &nbsp;
                        <label for="idFun"><b>ID:</b></label>
                        <input type="text" name="din_idFun[]" id="idFun" class="obrigatorio" maxlength="5" size="10">
                    </div>
                </div>

                <legend><b>Guichês - BUs</b></legend>
                <div class="inputBox2">
                    <div id="content-include">
                        <div>
                            <label for="apurado"><b>Prata</b></label>
                            <input type="number" name="bu_prata_apurado[]" id="apurado1" min="0" class="obrigatorio">
                        </div>
                        <div>
                            <label for="apurado"><b>Estudante</b></label>
                            <input type="number" name="bu_estudante_apurado[]" id="apurado" min="0" class="obrigatorio">
                        </div>
                        <div>
                            <label for="apurado"><b>Prata Personalizado</b></label>
                            <input type="number" name="bu_prata_personalizado[]" id="perso" min="0" class="obrigatorio">
                            <label for="apurado"><b>Estudante Personalizado</b></label>
                            <input type="number" name="bu_estudante_personalizado[]" id="perso" min="0" class="obrigatorio">
                        </div>
                        <hr>
                        <div>
                            <label for="funcionario"><b>Nome do Funcionário:</b></label>
                            <input type="text" name="bu_funcionario[]" id="funcionario" class="obrigatorio" size="25">
                            &nbsp;
                            <label for="idFun"><b>ID:</b></label>
                            <input type="text" name="bu_idFun[]" id="idFun" class="obrigatorio" maxlength="5" size="10">
                        </div>
                        <div id="button-add">
                            <a id="add-content" class="add">Incluir +</a>
                        </div>
                    </div>
                </div>
                <legend><b>Pastas</b></legend>
                <div class="inputBox2">
                    <div id="content_pastas">
                        <div>
                            <label for="apurado"><b>Prata</b></label>
                            <input type="number" name="pasta_prata_apurado[]" id="apurado1" min="0" class="obrigatorio">
                        </div>
                        <div>
                            <label for="apurado"><b>Estudante</b></label>
                            <input type="number" name="pasta_estudante_apurado[]" id="apurado" min="0" class="obrigatorio">
                        </div>
                        <div>
                            <label for="apurado"><b>Prata Personalizado</b></label>
                            <input type="number" name="pasta_prata_personalizado[]" id="perso" min="0" class="obrigatorio">
                            <label for="apurado"><b>Estudante Personalizado</b></label>
                            <input type="number" name="pasta_estudante_personalizado[]" id="perso" min="0" class="obrigatorio">
                        </div>
                        <hr>
                        <div>
                            <label for="funcionario"><b>Nome do Funcionário:</b></label>
                            <input type="text" name="pasta_funcionario[]" id="funcionario" class="obrigatorio" size="25">
                            &nbsp;
                            <label for="idFun"><b>ID:</b></label>
                            <input type="text" name="pasta_idFun[]" id="idFun" class="obrigatorio" maxlength="5" size="10">
                        </div>
                        <div id="pastas-content">
                            <a id="add-content-pasta" class="add">Incluir +</a>
                        </div>
                    </div>
                </div>
            </div>
            <legend><b>Cofre</b></legend>
            <div class="inputBox2">
                <div id="content-cofre">
                    <div>
                        <label for="apurado"><b>Prata</b></label>
                        <input type="number" name="cof_prata_personalizado[]" id="sistema" min="0" class="obrigatorio">
                        <label for="apurado"><b>Estudante</b></label>
                        <input type="number" name="cof_estudante_personalizado[]" id="sistema" min="0" class="obrigatorio">

                    </div>
                    <div>
                        <label for="apurado"><b>Devolvidos</b></label>
                        <input type="number" name="cof_prata_devolvido[]" id="sistema" min="0" class="obrigatorio">
                        <label for="apurado"><b>Hot-List</b></label>
                        <input type="number" name="cof_hot_list[]" id="sistema" min="0" class="obrigatorio">
                    </div>
                    <div id="cofre-content">
                        <a id="add-content-cofre" class="add">Incluir +</a>
                    </div>
                </div>
            </div>
            <legend><b>Sistema</b></legend>
            <div class="inputBox2">
                <div>
                    <label for="apurado"><b>Prata - SEC</b></label>
                    <input type="number" name="prata_personalizado" id="sistema" min="0" class="obrigatorio">
                    <label for="apurado"><b>Estudante - SEC</b></label>
                    <input type="number" name="estudante_personalizado" id="sistema" min="0" class="obrigatorio">
                </div>
                <div>
                    <label for="apurado"><b>Devolvidos - SA</b></label>
                    <input type="number" name="prata_sa" id="sistema" min="0" class="obrigatorio">
                </div>
            </div>
            <legend><b>Posto RH</b></legend>
            <div class="inputBox2">
                <div>
                    <label for="responsavel"><b>Encarregado:</b></label>
                    <input type="text" name="responsavel" id="responsavel" class="obrigatorio" size="25">
                    &nbsp;&nbsp;
                    <label for="chapa"><b>ID:</b></label>
                    <input type="name" name="chapa" id="chapa" class="obrigatorio" min="0" size="8">
                </div>
                <hr>
                <div>
                    <label for="atendente"><b>Atendentes:</b></label>
                    <input type="number" name="atendente" id="op_posto" class="inputUser" min="0" max="30">
                    <label for="tri"><b>Triagem:</b></label>
                    <input type="number" name="triagem" id="op_posto" class="inputUser" min="0" max="3">
                    <label for="jv"><b>Jovem Aprendiz:</b></label>
                    <input type="number" name="jv" id="op_posto" class="inputUser" min="0" max="3">
                </div>
                <div>
                    <label for="uniforme"><b>Uniforme:</b></label>
                    <input type="number" name="uniforme" id="op_posto" class="inputUser" min="0" max="40">
                    <label for="cracha"><b>Crachá:</b></label>
                    <input type="number" name="cracha" id="op_posto" class="inputUser" min="0" max="40">
                </div>
            </div>
            <legend><b>Operação</b></legend>
            <div class="inputBox2">
                <div>
                    <label for="guiche"><b>Guichê:</b></label>
                    <input type="number" id="firstGuiche" name="guiche" class="inputUser" min="0" max="10">
                    <label for="ativo"><b>Ativos:</b></label>
                    <input type="number" name="ativo" id="ativ" class="inputUser" min="0" max="10">
                    <label for="inativo"><b>Inativo:</b></label>
                    <input type="number" name="inativo" id="inativo" class="inputUser" min="0" max="10">
                </div>
                <div>
                    <label for="tablet"><b>Tablet:</b></label>
                    <input type="number" id="tablet" name="tablet" class="inputUser" min="0" max="3">
                    <label for="secondAtv"><b>Ativos:</b></label>
                    <input type="number" name="secondAtv" id="secondAtv" class="inputUser" min="0" max="3">
                    <label for="secondItv"><b>Inativo:</b></label>
                    <input type="number" name="secondItv" id="secondIntv" class="inputUser" min="0" max="3">
                </div>
                <div>
                    <label for="agem"><b>Triagem:</b></label>
                    <input type="number" name="agem" class="inputUser" min="0" max="3">
                    <label for="thirddAtv"><b>Ativos:</b></label>
                    <input type="number" name="thirddAtv" class="inputUser" min="0" max="3">
                    <label for="thirdItv"><b>Inativo:</b></label>
                    <input type="number" name="thirdItv" class="inputUser" min="0" max="3">
                </div>
                <hr>
                <div>

                    <label for="impacto"><b>Impacto na Operação?</b></label>
                </div>
                <div>
                    <label for="checkbox-impacto"><b>Sim</b></label>
                    <input type="checkbox" id="checkbox-impacto" name="impacto" class="inputUser" value="Sim">
                </div>
                <div class="inputBox2">
                    <div class="content-impacto">
                        <label for="infra"><b>Equipamentos</b></label>
                        <select name="infra" class="obrigatorio" id="infra">
                            <option value="sem valor" disabled selected>Selecione</option>
                            <option value="Impressora Comum">Impressora Comum</option>
                            <option value="Impressora Smart">Impressora Smart</option>
                            <option value="CPU">CPU</option>
                            <option value="Leitora">Leitora</option>
                            <option value="Monitor">Monitor</option>
                            <option value="Mouse">Mouse</option>
                            <option value="Teclado">Teclado</option>
                        </select>
                        <label for="chamado"><b>Numero Chamado:</b></label>
                        <input type="text" name="chamado" id="chamado" class="obrigatorio" size="10">
                        <div><br><br>
                            <label for="tempo"><b>Quanto tempo</b></label>
                            <input type="text" name="tempo" id="tempo" class="obrigatorio" size="10">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="inputBox2">
                    <div>
                        <b>Horário Saída:</b>
                        <input type="time" class="obrigatorio" name="hrSaida" id="hr" min="06:00" max="23:59">
                    </div>
                    <div class="inputBox2">
                        <a name="gerarPdf" id="gerarPdf" class="nxt"><b>Enviar</b></a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    <div id="modal-form" class="modal-container">
        <div class="modal">
            <h2 class="coment">Relate sua vistoria</h2>
            <label class="label-satisfy" for="text-satisfy"><b>Descrição Fiscal</b></label>
            <hr>
            <textarea name="text-satisfy" rows="10" cols="80" style="resize: none;" placeholder="Digite aqui"></textarea>
            <br><br>
            <button name="enviar" id="enviar" type="submit" class="nxt"><b>Enviar</b></button>
</form>
</div>

<script>
    function openModal(modalID) {
        const modal = document.getElementById(modalID);
        if (modal) {
            modal.classList.add('openModal');
            modal.addEventListener('click', (e) => {
                if (e.target.id == modalID) {
                    modal.classList.remove('openModal');
                }
            })
        }
    }
    const btnModal = document.getElementById('gerarPdf');

    btnModal.addEventListener('click', () => openModal('modal-form'));
</script>

<script>
    var checkbox = document.getElementById('checkbox-impacto');
    var conteudo = document.querySelector('.content-impacto');

    checkbox.addEventListener('change', function() {
        if (checkbox.checked) {
            conteudo.style.display = 'block';
        } else {
            conteudo.style.display = 'none';
        }
    });
</script>

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
</script>