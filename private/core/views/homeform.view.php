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
        <a href="#" class="go_form"><i class="fas fa-chart-line"></i> DashBoard</a>
        <a href="formulario" class="go_form">+Criar Formulário</a>
        <a href="home" class="go_form"><i class="bi bi-house-door-fill"></i> Início</a>
    </div>
</div>
<div tabindex="0" onclick="close_menu()" class="content1" id="content">
    <div class="all_content">
        <i class="bi bi-clipboard2-check"></i>
        <br><br>
        <h2>Relatório Fiscalização</h2>
        <div class="search">
            <br>
            <input type="text" name="pesquisa" class="pesquisa" id="pesquisa" placeholder="Pesquisar...">
            <button type="submit" onclick="searchHomeForm()" type="submit" class="btn_search" id="btn_search" name="btn_search">Buscar</button>
        </div>
        <script>
            var btn = document.getElementById('pesquisa')

            btn.addEventListener("keydown", function(event) {
                if (event.key === "Enter") {
                    searchHomeForm();
                }
            })
        </script>
        <br><br><br>
        <div class="table_aling">
            <table>
                <thead>
                    <tr>
                        <th style="width:50px" class="identificador">Chave</th>
                        <th style="width:250px" class="uni">Unidade</th>
                        <th style="width: 70px;" class="sts">Status</th>
                        <th style="width:70px" class="data_visita">Data da Visita</th>
                        <th style="width:50px"><i class="bi bi-eye-fill"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result == true) {
                        foreach ($result as $data) : ?>
                            <tr>
                                <td class='colum_one'>RFC -<?= $data->RFC ?></td>
                                <td class='uni'><a class='link_view' href='rfc?id=<?= $data->RFC ?>'><?= $data->UNIDADE ?></a></td>
                                <td class='sts'><?= $data->NOM_STATUS ?></td>
                                <td class='data_visita'><?= $data->DTA_VISITA = implode("/", array_reverse(explode('-', $data->DTA_VISITA))) ?></td>
                                <td>
                                    <a class='btn-onefunction' id='gerarPdf' href='<?= ROOT?>/rfc?id=<?= $data->RFC ?>'>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-printer-fill' viewBox='0 0 16 16'>
                                            <path d='M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z' />
                                            <path d='M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z' />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                    <?php endforeach;
                    } ?>
                </tbody>
            </table>
            <?php if ($result == null) {
                (count($error) > 0)  ?>
                <div class="error404">
                    <strong><i class="bi bi-exclamation-diamond-fill"></i></strong>
                    <b>Pesquisa não encontrada</b>
                    <a href="<?= ROOT ?>/homeform">Voltar para a pesquisa</a><img src="<?= ROOT ?>/assets/style/img/404.jpg" style=" height: 16vw;"><br>
                    <i>Por favor certifique se os dados foram enviados corretamente</i>
                </div>
            <?php  } ?>
        </div>
    </div>
</div>
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
<?php $this->view('includes/footer'); ?>