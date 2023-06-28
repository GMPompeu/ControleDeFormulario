<?php
class HomeForm extends Controller
{
    function index()
    {
        $error = array();
        $tableform = new TableForm();
        $result = null;
        $usuario = new Usuario();
        $data = $_SESSION['USUARIO']->USUARIO_LOGIN;
        if (!Auth::loggetin()) {
            $this->redirect('login');
        }
        if ($row = $usuario->where('USUARIO_LOGIN', $data)) {
            $row = $row[0];
            if ($row->IDF_ATIVO != 'S') {
                $this->redirect('login');
            }
        }
        if (!empty($_GET['search'])) {
            $tableform = new TableForm();
            $data = $_GET['search'];
            $result = $tableform->searchHomeForm($data);
            if ($result === null) {
                $tableform->validate($data);
            }
        } else {
            $result = $tableform->selectHomeform();
        }
        $error = $tableform->error;

        $this->view('homeform', ['result' => $result, 'error' => $error]);
    }
}
