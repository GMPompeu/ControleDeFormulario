<?php

class Rfc extends Controller
{


    function index()
    {
        $selectRfc = new SelectRfc();
        $model = new Model();
        $error = array();
        $errorAcess = array();
        $errorConf = array();
        $alterar = new AlterStatus();
        $registrar = new Registrar();
        date_default_timezone_set('America/Sao_Paulo');
        $dta_cri = date("Y-m-d H:i:s");

        //ACESSO GERAL SPTRANS = 4 - ACESSO GERAL ATHENS = 3 - ACESSO GESTOR FISCALIZAÇÃO = 2 ACESSO FISCALIZAÇÃO = 1

        if (!Auth::loggetin()) {
            $this->redirect('logout');
        }
        if (Auth::idfativo() != "S") {
            $this->redirect('logout');
        }
        if (Auth::acess() != 4 && Auth::acess() != 3 && Auth::acess() != 2 && Auth::acess() != 1) {
            $this->redirect('homeform');
        }
        if (($_GET['id'])) {

            $data = $_GET['id'];

            // RESULTADO DE TODO O FORMULARIO MENOS SOMAS
            $result = $selectRfc->selectRfc($data);
            if (is_array($result) && count($result) > 0) {

                $guiche = $selectRfc->bu_gui($data);
                $guidin = $selectRfc->gui_din($data);
                $pastas = $selectRfc->pasta($data);
                $cofre = $selectRfc->cofre($data);

                // ------------------------------QUANTIDADE DE PRATA GUICHE-----------------------------------------
                $pratagui = $guiche[0]->PRATA_GUI + $guidin[0]->PRATA_DIN;

                // ------------------------------QUANTIDADE DE ESTUDANTE GUICHE-----------------------------------------
                $estudantegui = $guiche[0]->ESTD_GUI + $guidin[0]->ESTD_DIN;

                // ------------------------------ DIFERENÇA PRATA-----------------------------------------
                $diferencaPrata = ($pratagui + $pastas[0]->PRATA_PASTA + $cofre[0]->COF_PRATA) - $result[0]->SIS_PRATA;
                
                // ------------------------------ DIFERENÇA ESTUDANTE-----------------------------------------
                $diferencaEstd = ($estudantegui + $pastas[0]->ESTD_PASTA + $cofre[0]->COF_ESTD) - $result[0]->SIS_ESTD;

                // ------------------------------ DIFERENÇA PRATA-----------------------------------------
                $diferencaDevol =  $cofre[0]->COF_DEVOLVIDOS - $result[0]->SIS_DEVOL;
                
                // ------------------------------ DIFERENÇA PRATA-----------------------------------------
                $taxa = ($result[0]->TX_COMUM * 30.80) + ($result[0]->TX_ESTUDANTE * 30.80);
                $total = ($taxa + $result[0]->VL_COMUM + $result[0]->VL_ESCOLAR + $result[0]->VL_FIDELIDADE);
                
                $diferenca = $total - $result[0]->CONTADO;
                
            } else {
                $error = "Oops! pesquisa não encontrada";
                $this->view('rfc', ['error' => $error, 'result' => $result]);
            }
        }
        // ----------------------------------ALTERAR STATUS-------------------------------------------------------------------
        if (count($_POST) > 0) {
            if (isset($_POST['concluir'])) {
                if ($alterar->validateConc($_POST)) {
                    $idstatus['ID_STATUS'] = $_POST['concluir'];
                    $idstatus['COMENTDGQ'] = $_POST['respDGQ'];
                    $idstatus['DTA_CONCLUSAO'] = $dta_cri;
                    $alterar->updateConcluir($data, $idstatus);
                    echo '<script>window.location.href = window.location.href;</script>';
                    exit();
                } else {
                    $errorAcess = $alterar->errorAcess;
                }
            }
        }

        if (count($_POST) > 0) {
            if (isset($_POST['atendimento'])) {
                if ($alterar->validateAtend($_POST)) {
                    $idstatus['ID_STATUS'] = $_POST['atendimento'];

                    $alterar->updateConcluir($data, $idstatus);
                    echo '<script>window.location.href = window.location.href;</script>';
                    exit();
                } else {
                    $errorAcess = $alterar->errorAcess;
                }
            }
        }

        if (count($_POST) > 0) {
            if (isset($_POST['aguardando'])) {
                if ($alterar->validateAguard($_POST['aguardando'])) {
                    $idstatus['ID_STATUS'] = $_POST['aguardando'];

                    $alterar->updateConcluir($data, $idstatus);
                    echo '<script>window.location.href = window.location.href;</script>';
                    exit();
                } else {
                    $errorAcess = $alterar->errorAcess;
                }
            }
        }

        // ------------------------------ALTERAR AVALIAÇÃO SPT------------------------------------------------------
        if (count($_POST) > 0) {
            if (isset($_POST['respSPT'])) {
                if ($alterar->validateNaoconf($_POST)) {
                    $idstatus['ID_RESP_SPT'] = $_POST['naoconf'];
                    $idstatus['RESP_FINAL'] = $_POST['respSPT'];
                    $idstatus['GLOSA_CHAMADO'] = isset($_POST["chamado"]) ? $_POST["chamado"] : 0;
                    $idstatus['GLOSA_CRACHA'] = isset($_POST["cracha"]) ? $_POST["cracha"] : 0;
                    $idstatus['GLOSA_DEVOLVIDOS'] = isset($_POST["devol"]) ? $_POST["devol"] : 0;
                    $idstatus['GLOSA_ESTUDANTE'] = isset($_POST["estudante"]) ? $_POST["estudante"] : 0;
                    $idstatus['GLOSA_PRATA'] = isset($_POST["prata4k"]) ? $_POST["prata4k"] : 0;
                    $idstatus['GLOSA_TOTAL'] = isset($_POST["totaldif"]) ? $_POST["totaldif"] : 0;

                    $alterar->updateConcluir($data, $idstatus );
                    echo '<script>window.location.href = window.location.href;</script>';
                    exit();
                } else {
                    $errorConf = $alterar->errorConf;
                }
            }
        }
        if (count($_POST) > 0) {
            if (isset($_POST['conf'])) {
                if ($alterar->validateConf($_POST['conf'])) {
                    $idstatus['ID_RESP_SPT'] = $_POST['conf'];
                    $idstatus['GLOSA_CHAMADO'] = 0;
                    $idstatus['GLOSA_CRACHA'] =  0;
                    $idstatus['GLOSA_DEVOLVIDOS'] = 0;
                    $idstatus['GLOSA_ESTUDANTE'] =  0;
                    $idstatus['GLOSA_PRATA'] =  0;
                    $idstatus['GLOSA_TOTAL'] =  0;

                    $alterar->updateConcluir($data, $idstatus);
                    echo '<script>window.location.href = window.location.href;</script>';
                    exit();
                } else {
                    $errorConf = $alterar->errorConf;
                }
            }
        }

        if (count($_POST) > 0) {
            if (isset($_POST['indefinido'])) {
                if ($alterar->validateIdf($_POST['indefinido'])) {
                    $idstatus['ID_RESP_SPT'] = $_POST['indefinido'];
                    $idstatus['GLOSA_CHAMADO'] = '0';
                    $idstatus['GLOSA_CRACHA'] =  '0';
                    $idstatus['GLOSA_DEVOLVIDOS'] = '0';
                    $idstatus['GLOSA_ESTUDANTE'] = '0';
                    $idstatus['GLOSA_PRATA'] =  '0';
                    $idstatus['GLOSA_TOTAL'] =  '0';

                    $alterar->updateConcluir($data, $idstatus);
                    echo '<script>window.location.href = window.location.href;</script>';
                    exit();
                } else {
                    $errorConf = $alterar->errorConf;
                }
            }
        }


        $this->view('rfc', [
            'result' => $result,'error' => $error, 'errorAcess' => $errorAcess,
            'errorConf' => $errorConf, 'pratagui' => $pratagui, 'diferencaPrata' => $diferencaPrata,
            'pastas' => $pastas, 'cofre' => $cofre, 'estudantegui' => $estudantegui, 'diferencaEstd' => $diferencaEstd,
            'diferencaDevol' => $diferencaDevol, 'diferenca' => $diferenca, 'total' => $total
        ]);
    }
}
