<?php
class Login extends Controller
{
    function index()
    {
        //ACESSO GERAL SPTRANS = 4 - ACESSO GERAL ATHENS = 3 - ACESSO GESTOR FISCALIZAÇÃO = 2 ACESSO FISCALIZAÇÃO = 1
        $error = array();
        $success = array();
        if(isset($_GET['success']) && $_GET['success'] == 1){
            $success['chapa'] = "•Senha alterada com sucesso!";
        }
        if (count($_POST) > 0) {
            $usuario = new Usuario();
            if ($row = $usuario->where('USUARIO_LOGIN', $_POST['chapa'])) {
                $row = $row[0];
                if ($row->IDF_ATIVO == 'S'){
                if (password_verify($_POST['senha'], $row->USUARIO_SENHA)) {
                    Auth::authenticate($row);
                    $this->redirect('home');
                }
            }
            }
            $error['chapa'] = "•Prontuário ou Senha incorretos";
        }

        $this->view('login', ['error' => $error, 'success'=> $success]);
    }
}
