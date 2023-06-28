<?php
class Home extends Controller
{
    function index()
    {
        // ACESSO GERAL = 3 || ACESSO FISCALIZAÇÃO = 1

        $error = array();
        $usuario = new Usuario();
        $data = $_SESSION['USUARIO']->USUARIO_LOGIN;
        if(!Auth::loggetin()){
            $this->redirect('login');
        }
        if($row = $usuario->where('USUARIO_LOGIN', $data)){
        $row = $row[0];
        if ($row->IDF_ATIVO != 'S' ) {
            $this->redirect('login');
        }
        if($row->NIVEL_ACESSO == 1){
            $this->redirect('homeform');
        }
        }
        $data = $usuario->findAll();
        $this->view('home',['rows'=>$data, 'error' => $error]);
    }
};
