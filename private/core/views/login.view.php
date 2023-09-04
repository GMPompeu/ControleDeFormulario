 <?php $this->view('includes/header'); ?>
 <div class="telaPrincipal">
     <img src="<?= ROOT ?>/assets/style/img/ath.png" alt="logo" style="position:absolute; left: 10%; top: 0%; " width=" " height="100" title="Athens Servios em Transporte">
     <img src="<?= ROOT ?>/assets/style/img/spt.png" alt="logo" style="position:absolute; left: 70%; top: 4%; " width="" height="50" title="São Paulo Transporte ">
     <br><br>
     <?php if (count($error) > 0) : ?>

         <div class="alertlogin" role="alert">
             <strong>Error</strong>
             <br>Por favor conferir os dados:<br>
             <?php foreach ($error as $error) : ?>
                 <br><?= $error ?>

             <?php endforeach; ?>
         </div>

     <?php endif; ?>

     <br><br>
     <h1 class="title_login">Login</h1>


     <?php if (count($success) > 0) : ?>
         <?php foreach ($success as $success) : ?>
             <div class="success">
                 <strong>Success!</strong>
                 <br><?= $success ?><br>
                 <br>
                 <h4>Entre com sua nova senha<h4>
             </div>
         <?php endforeach; ?>
     <?php endif; ?>


     <div class="content-login">
         <form method="post">
             <div class="label-float">
                 <br><br>
                 <input class="login" type="text" name="chapa" placeholder="Prontuário">
             </div>
             <br><br>
             <div class="label-float">
                 <input class="login" type="password" name="senha" id="senhalogin" placeholder="Senha">
             </div>
             <br>
             <input type="checkbox" id="mostrar" onclick="mostrarSenhaLogin()">
             <label for="mostrar">Mostrar senha</label>
             <br><br><br>
             <button type="submit" class="button" name="submit">Entrar</button>
             <br><br>
         </form>
     </div>
 </div>
 <?php $this->view('includes/footer'); ?>