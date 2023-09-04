<?php

class DashBoard extends Controller
{

    //ACESSO GERAL SPTRANS = 4 - ACESSO GERAL ATHENS = 3 - ACESSO GESTOR FISCALIZAÇÃO = 2 ACESSO FISCALIZAÇÃO = 1
    function index()
    {
        if (!Auth::loggetin()) {
            $this->redirect('logout');
        }
        if (Auth::idfativo() != "S") {
            $this->redirect('logout');
        }
        if (Auth::acess() != 4 && Auth::acess() != 3 && Auth::acess() != 2 && Auth::acess() != 1) {
            $this->redirect('homeform');
        }
        date_default_timezone_set('America/Sao_Paulo');
        $dta = date("m");

        $model = new modelDash;
        $error = array();
        $rfc = 0;

        // Inicializando as variáveis para evitar "Undefined variable"
        $prata4k = array();
        $prata4kglosa = 0;
        $estudante = array();
        $estudanteglosa = 0;
        $diferenca = array();
        $cracha = array();
        $crachaglosa = 0;
        $aberto = 0;
        $conc = 0;
        $atend = 0;
        $aguard = 0;
        $meses = array(
            'Jan' => 0, 'Feb' => 0, 'Mar' => 0, 'Apr' => 0, 'May' => 0, 'Jun' => 0, 'Jul' => 0,
            'Aug' => 0, 'Sep' => 0, 'Oct' => 0, 'Nov' => 0, 'Dec' => 0
        );
        
        $mensal = $model->mensal();
        foreach ($mensal as $rf) {
            $data_visita = new DateTime($rf->DTA_CRIACAO);
            $mes = $data_visita->format('M');

            if (array_key_exists($mes, $meses)) {
                $meses[$mes]++;
            }
        }

        if (isset($_GET['monthSelect'])) {
            $month = $_GET['monthSelect'];

            // ------------------------------TOTAL DE RFC----------------------------------
            if ($rfc = $model->rfc($month)) {

                // -------------------------------DIFERENÇA PRATA------------------------------
                $prata4k = $model->prataFaltante($month);
                $prata4kglosa = $prata4k[0]->DIF_PRATA * 30.80;

                // -------------------------------DIFERENÇA ESTUDANTE------------------------------
                $estudante = $model->estudanteFaltante($month);
                $estudanteglosa = $estudante[0]->DIF_ESTD * 30.80;

                // -------------------------------DIFERENÇA R$------------------------------
                $diferenca = $model->diferenca($month);

                $cracha = $model->cracha($month);
                $crachaglosa = $cracha[0]->DIF_CRACHA * 88;

                // ------------------------------STATUS E RELATORIOS POR MÊS---------------------

                $aberto = 0;
                $conc = 0;
                $atend = 0;
                $aguard = 0;

                foreach ($rfc as $rf) {
                    if ($rf->ID_STATUS == '1') {
                        $aberto++;
                    } elseif ($rf->ID_STATUS == '2') {
                        $conc++;
                    } elseif ($rf->ID_STATUS == '3') {
                        $atend++;
                    } elseif ($rf->ID_STATUS == '4') {
                        $aguard++;
                    }
                };
            } 
        } elseif (isset($_GET['dateInity'])) {
            if (isset($_GET['dateEnd'])) {
                $date = $_GET['dateInity'] ? $_GET['dateInity'] : date('00:00:00', strtotime($_GET['dateInity']));
                $date1 = $_GET['dateEnd'] ? $_GET['dateEnd'] : date('00:00:00', strtotime($_GET['dateEnd']));
                $datetime_start = date('Y-m-d 00:00:00', strtotime($date));
                $datetime_end = date('Y-m-d 23:59:59', strtotime($date1));
                // ------------------------------TOTAL DE RFC----------------------------------
                if ($rfc = $model->rfcbetween($datetime_start, $datetime_end)) {

                    // -------------------------------DIFERENÇA PRATA------------------------------
                    $prata4k = $model->prataBetween($datetime_start, $datetime_end);
                    $prata4kglosa = $prata4k[0]->DIF_PRATA * 30.80;

                    // -------------------------------DIFERENÇA ESTUDANTE------------------------------
                    $estudante = $model->estudanteBetween($datetime_start, $datetime_end);
                    $estudanteglosa = $estudante[0]->DIF_ESTD * 30.80;

                    // -------------------------------DIFERENÇA R$------------------------------
                    $diferenca = $model->diferencaBetween($datetime_start, $datetime_end);

                    // -------------------------------CRACHÁ------------------------------
                    $cracha = $model->crachaBetween($datetime_start, $datetime_end);
                    $crachaglosa = $cracha[0]->DIF_CRACHA * 88;
                    $aberto = 0;
                    $conc = 0;
                    $atend = 0;
                    $aguard = 0;

                    foreach ($rfc as $rf) {
                        if ($rf->ID_STATUS == '1') {
                            $aberto++;
                        } elseif ($rf->ID_STATUS == '2') {
                            $conc++;
                        } elseif ($rf->ID_STATUS == '3') {
                            $atend++;
                        } elseif ($rf->ID_STATUS == '4') {
                            $aguard++;
                        }
                    };
                } else {
                    $error = true;
                }
            }
        }
        $this->view('dashboard', [
            'prata4k' => $prata4k, 'prata4kglosa' => $prata4kglosa, 'estudanteglosa' => $estudanteglosa,
            'estudante' =>  $estudante, 'diferenca' => $diferenca, 'cracha' => $cracha, 'crachaglosa' => $crachaglosa,
            'rfc' => $rfc, 'error' => $error, 'dta' => $dta, 'aberto' => $aberto, 'conc' => $conc, 'atend' => $atend, 'aguard' => $aguard, 'meses' => $meses
        ]);
    }
}
