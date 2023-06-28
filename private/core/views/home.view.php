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

<div tabindex="0" onclick="close_menu()" class="content2" id="content">
    <div class="contentRelatorios">
        <h1 class="titlulo" class="bv" id="titulo">Bem Vindo(a) - <?= Auth::user() ?> </h1>
        <br><br>
        <div class="relatorio">
            <i class="bi bi-clipboard2-check"></i>
            <h3><a href="homeform">Relatório Fiscalização</a></h3>
        </div>
        <div class="relatorio">
            <i class="bi bi-exclamation-diamond-fill"></i>
            <h3><a href="">Relatório Reclamações</a></h3>
        </div>
        <div class="relatorio">
            <i class="bi bi-person-fill-add"></i>
            <h3><a href="cadastrar">Cadastrar Usuário</a></h3>
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