<?php


class AlterarSenha extends Controller
{

    function index()
    {
        if (!Auth::loggetin()) {
            $this->redirect('logout');
        }
        if (Auth::idfativo() != "S" ){
            $this->redirect('login');
        }
        $erro = array();
        $data = $_SESSION['USUARIO']->USUARIO_LOGIN;
        if (count($_POST) > 0) {
            $usuario = new Usuario();
            if ($row = $usuario->where('USUARIO_LOGIN', $data)) {
                $row = $row[0];
                if (password_verify($_POST['senhatual'], $row->USUARIO_SENHA)) {
                    Auth::authenticate($row);
                    if ((strlen($_POST['novasenha']) >= 8) && (strlen($_POST['novasenha1']) >= 8)) {
                        if ($_POST['novasenha'] == $_POST['novasenha1']) {
                            $senha = password_hash($_POST['novasenha1'], PASSWORD_DEFAULT);
                            $usuario->update($row->ID_USUARIO, array('USUARIO_SENHA' => $senha));
                            Auth::logout();
                            $this->redirect('login?success=1');
                        } else {
                            $erro['novasenha1'] = "•A confirmação da senha não corresponde à nova senha";
                        }
                    } else {
                        $erro['novasenha1'] = "•Minímo de oito caracteres";
                    }
                } else {
                    $erro['senhatual'] = "•Senha Invalida!";
                }
            }
        }

        $this->view('alterarsenha', ['erro' => $erro]);
    }
}
