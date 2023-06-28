<?php

class Rfc extends Controller{

    
    function index(){
        $selectRfc = new SelectRfc();

        if(!Auth::loggetin()){
            $this->redirect('login');
        }
        if (!empty($_GET['id'])){
            $data = $_GET['id'];

            // RESULTADO DE TODO O FORMULARIO MENOS SOMAS
           $result = $selectRfc->selectRfc($data);

            // SOMAS PARA CAMPO GUICHES
           $guiches = $selectRfc->selectGuiches($data);

            // SOMAS PARA CAMPO PASTAS E COFRE
            $pastas = $selectRfc->selectPasta($data);

            // SELECT PARA CAMPOS EM DINHEIRO 
            $dinheiro = $selectRfc->selecDinheiro($data);

            // DIFERENCA ENTRE OS ITENS NA QUERY A CIMA PRATA4K
            $dif_prata = $guiches[0]->GUICHE_PRATA + $pastas[0]->PASTA_PRATA + $pastas[0]->COF_PRATA - $result[0]->SIS_PRATA ;

            // DIFERENCA ENTRE OS ITENS NA QUERY A CIMA ESTUDANTE
            $dif_estd = $guiches[0]->GUICHE_ESTUDANTE + $pastas[0]->PASTA_ESTUDANTE + $pastas[0]->COF_ESTD - $result[0]->SIS_ESTD ;

            // DIFERENCA ENTRE OS ITENS NA QUERY A CIMA DEVOLVIDOS
            $dif_devol = $pastas[0]->COF_DEVOLVIDOS - $result[0]->SIS_DEVOL;

            // DIFERENCA E SOMA ENTRE OS ITENS NA QUERY A CIMA EM R$
            $apurado = ($dinheiro[0]->TX_COMUM * 30.80) + $dinheiro[0]->VL_COMUM ;
            $diferenca = $apurado - $dinheiro[0]->CONTADO ;


           $this->view('rfc', ['result' => $result, 'guiches' => $guiches,
                'pastas'=>$pastas, 'dif_prata' => $dif_prata, 'dif_estd' => $dif_estd, 
                'dif_devol'=> $dif_devol, 'apurado' => $apurado, 'dinheiro'=> $dinheiro,
            'diferenca'=> $diferenca]);
        }
    }

}