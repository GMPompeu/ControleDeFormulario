<?php
class Home extends Controller
{
    function index()
    {
        //ACESSO GERAL SPTRANS = 4 - ACESSO GERAL ATHENS = 3 - ACESSO GESTOR FISCALIZAÇÃO = 2 ACESSO FISCALIZAÇÃO = 1
        $error = array();
        $usuario = new Usuario();

        if (!Auth::loggetin()) {
            $this->redirect('logout');
        }
         if (Auth::idfativo() != "S") {
             $this->redirect('logout');
         }
         if (Auth::acess() != 4 && Auth::acess() != 3 && Auth::acess() != 2 ){
            $this->redirect('homeform');
        }
        
        $this->view('home', ['error' => $error]);
    }
}

