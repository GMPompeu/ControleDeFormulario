<?php
class Login extends Controller
{
    function index()
    {
        // ACESSO GERAL = 3 || ACESSO FISCALIZAÇÃO = 1
        $error = array();
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

        $this->view('login', ['error' => $error]);
    }
};
