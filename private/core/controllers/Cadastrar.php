<?php
class Cadastrar extends Controller
{
    function index()
    {

        $error = array();
        $usuario = new Usuario();
        $data = $_SESSION['USUARIO']->USUARIO_LOGIN;
        if(!Auth::loggetin()){
            $this->redirect('login');
        }
        if($row = $usuario->where('USUARIO_LOGIN', $data)){
            $row = $row[0];
            if($row->NIVEL_ACESSO == 1){
                $this->redirect('homeform');
            }
        }

        if (count($_POST) > 0) {
            $usuario = new Usuario();
            if ($usuario->validate($_POST)) {
                $arr['USUARIO_LOGIN'] = $_POST['chapa'];
                $arr['USUARIO_SENHA'] = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $arr['USUARIO_NOM'] = $_POST['nom_usuario'];
                $arr['USUARIO_EMAIL'] = $_POST['usuario_email'];
                $arr['IDF_ATIVO'] = 'S';
                $arr['NIVEL_ACESSO'] = $_POST['nivel_acesso'];

                $usuario->insert($arr);

                $this->redirect('login');
            } else {
                $error = $usuario->error;
            }
        }
        $this->view('cadastrar', ['error' => $error]);
    }
};
