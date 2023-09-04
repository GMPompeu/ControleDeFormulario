<?php $this->view('includes/header'); ?>
<div class="cadastrar">
<?php  if(count($erro)>0): ?>

<div class="alertcadastro" role="alert">
    <strong>Error</strong>
    <br><b>Por favor conferir os dados</b>
    <?php  foreach($erro as $erro): ?>
    <br><?=$erro?><br>

    <?php endforeach;?>
</div>

<?php endif;?>
    <form method="POST">
        <h3>Alterar Senha</h3>
        <hr>
        <label for="chapa">Senha atual</label>
        <input type="password" class="cadastrar1" id="senhatual" name="senhatual" placeholder="Digite..." required>
        <label for="">Nova Senha</label>
        <input type="password" class="cadastrar1" id="senhanova" name="novasenha"placeholder="Digite..."required>
        <label for="">Confirmar Nova Senha</label>
        <input type="password" class="cadastrar1" id="senhanova1" name="novasenha1"placeholder="Digite..."required>
        <input type="checkbox" id="mostrar" onclick="mostrarSenha()">
        <label for="mostrar">Mostrar senha</label>
        <button class="send_pront">Enviar</button>
    </form>
</div>


<?php $this->view('includes/footer'); ?>