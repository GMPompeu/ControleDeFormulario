<?php
class Formulario extends Controller
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
            $this->redirect('home');
        }

        $error = array();

        
        $registrar = new Registrar();
        if ($registrar->validade($_POST)) {
            $fiscal = $registrar->getFiscal();
            $fiscalII = $registrar->getFiscalII();
            $fiscalIII = $registrar->getFiscalIII();
            // ------------------------------TABELA EQUIP_TRABALHO_RFC----------------------------------------------------------
            $arrequip['PRONT_ONE'] = $_POST['firstPront'];
            $arrequip['NOM_ONE'] = $fiscal ;
            $arrequip['PRONT_TWO'] = $_POST['secondPront'];
            $arrequip['NOM_TWO'] = $fiscalII;
            $arrequip['PRONT_THREE'] = $_POST['thirdPront'];
            $arrequip['NOM_THREE'] = $fiscalIII;
            $id_equipe = $registrar->insertEquipTr($arrequip);

            // -------------------------------TABELA OPERACAO_RFC----------------------------------------------------------------

            $arrop['GUI_TOTAL'] = $_POST['guiche'];
            $arrop['GUI_ATIVO'] = $_POST['ativo'];
            $arrop['GUI_INATIVO'] = $_POST['inativo'];
            $arrop['TB_TOTAL'] = $_POST['tablet'];
            $arrop['TB_ATIVO'] = $_POST['secondAtv'];
            $arrop['TB_INATIVO'] = $_POST['secondItv'];
            $arrop['TRI_TOTAL'] = $_POST['agem'];
            $arrop['TRI_ATIVO'] = $_POST['thirddAtv'];
            $arrop['TRI_INATIVO'] = $_POST['thirdItv'];
            $arrop['EQUIPAMENTOS'] = isset($_POST['infra']) ? ($_POST['infra']) : null;
            $arrop['NUM_CHAMADO'] = isset($_POST['chamado']) ? ($_POST['chamado']) : null;
            $arrop['TEMPO'] = isset($_POST['tempo']) ? ($_POST['tempo']) : null;

            $id_op = $registrar->insertOp($arrop);


            // --------------------------------------TABELA RH_RFC----------------------------------------------------------------

            $arrRh['ENCARREGADO'] = $_POST['responsavel'];
            $arrRh['CHAPA'] = $_POST['chapa'];
            $arrRh['ATENDENTES'] = $_POST['atendente'];
            $arrRh['TRIAGEM'] = $_POST['triagem'];
            $arrRh['J_APRENDIZ'] = $_POST['jv'];
            $arrRh['UNIFORME'] = $_POST['uniforme'];
            $arrRh['CRACHA'] = $_POST['cracha'];
            $id_PRH = $registrar->insertPostoRH($arrRh);

            // --------------------------------------SISTEMA_RFC----------------------------------------------------------------


            $arrSis['SIS_PRATA'] = $_POST['prata_personalizado'];
            $arrSis['SIS_ESTD'] = $_POST['estudante_personalizado'];
            $arrSis['SIS_DEVOL'] = $_POST['prata_sa'];
            $id_sis = $registrar->insertSis($arrSis);

            // --------------------------------------FORMULARIO_FISC_RFC----------------------------------------------------------------

            $ID_USUARIO = $_SESSION['USUARIO']->ID_USUARIO;

            date_default_timezone_set('America/Sao_Paulo');
            $dta_cri = date("Y-m-d H:i:s");
            $arrRfc['UNIDADE'] = $_POST['unidades'];
            $arrRfc['DTA_CRIACAO'] = $dta_cri;
            $arrRfc['DTA_VISITA'] = $_POST['dataVisita'];
            $arrRfc['HR_CHEGADA'] = $_POST['hrChegada'];
            $arrRfc['HR_SAIDA'] = $_POST['hrSaida'];
            $arrRfc['COMENTSPT'] = $_POST['text-satisfy'];
            $arrRfc['ID_SISTEMA'] = $id_sis;
            $arrRfc['ID_USUARIO'] = $ID_USUARIO;
            $arrRfc['ID_EQUIPE'] = $id_equipe;
            $arrRfc['ID_OPERACAO'] = $id_op;
            $arrRfc['ID_P_RH'] = $id_PRH;
            $arrRfc['ID_STATUS'] = '1';
            $arrRfc['ID_RESP_SPT'] = '1';

            $id_rfc = $registrar->insertRfc($arrRfc);

            // ---------------------------------------PASTAS_RFC---------------------------------------------------------
            $pasta_prata_apurado = $_POST['pasta_prata_apurado'];
            $pasta_estudante_apurado = $_POST['pasta_estudante_apurado'];
            $pasta_prata_personalizado = $_POST['pasta_prata_personalizado'];
            $pasta_estudante_personalizado = $_POST['pasta_estudante_personalizado'];
            $pasta_funcionario = $_POST['pasta_funcionario'];
            $pasta_idFun = $_POST['pasta_idFun'];

            $count1 = count($pasta_prata_apurado);

            for ($i = 0; $i < $count1; $i++) {
                $data2 = array();
                $data2['PASTA_PRATA'] = isset($pasta_prata_apurado[$i]) ? $pasta_prata_apurado[$i] : null;
                $data2['PASTA_ESTD'] = isset($pasta_estudante_apurado[$i]) ? $pasta_estudante_apurado[$i] : null;
                $data2['PASTA_PER_PRATA'] = isset($pasta_prata_personalizado[$i]) ? $pasta_prata_personalizado[$i] : null;
                $data2['PASTA_PER_ESTD'] = isset($pasta_estudante_personalizado[$i]) ? $pasta_estudante_personalizado[$i] : null;
                $data2['NOM_FUN'] = isset($pasta_funcionario[$i]) ? $pasta_funcionario[$i] : null;
                $data2['ID_FUN'] = isset($pasta_idFun[$i]) ? $pasta_idFun[$i] : null;
                $data2['ID_RFC'] = $id_rfc;

                $id_pasta = $registrar->insertPasta($data2);
            }



            // --------------------------------------COFRE_FISC----------------------------------------------------------------

            $cof_prata_personalizado = $_POST['cof_prata_personalizado'];
            $cof_estudante_personalizado = $_POST['cof_estudante_personalizado'];
            $cof_prata_devolvido = $_POST['cof_prata_devolvido'];
            $cof_hot_list = $_POST['cof_hot_list'];

            $count = count($cof_prata_personalizado);

            for ($i = 0; $i < $count; $i++) {
                $data1 = array();
                $data1['COF_PRATA'] = isset($cof_prata_personalizado[$i]) ? $cof_prata_personalizado[$i] : null;
                $data1['COF_ESTD'] = isset($cof_estudante_personalizado[$i]) ? $cof_estudante_personalizado[$i] : null;
                $data1['COF_DEVOLVIDOS'] = isset($cof_prata_devolvido[$i]) ? $cof_prata_devolvido[$i] : null;
                $data1['HOT_LIST'] = isset($cof_hot_list[$i]) ? $cof_hot_list[$i] : null;
                $data1['ID_RFC'] = $id_rfc;

                $id_cof = $registrar->insertCofre($data1);
            }

            // --------------------------------------GUICHES_BUS_SPT----------------------------------------------------------------
            $bu_prata_apurado = $_POST['bu_prata_apurado'];
            $bu_estudante_apurado = $_POST['bu_estudante_apurado'];
            $bu_prata_personalizado = $_POST['bu_prata_personalizado'];
            $bu_estudante_personalizado = $_POST['bu_estudante_personalizado'];
            $bu_funcionario = $_POST['bu_funcionario'];
            $bu_idFun = $_POST['bu_idFun'];

            $count2 = count($bu_prata_apurado);

            for ($i = 0; $i < $count2; $i++) {
                $data3 = array();
                $data3['BU_PRATA'] = isset($bu_prata_apurado[$i]) ? $bu_prata_apurado[$i] : null;
                $data3['BU_ESTD'] = isset($bu_estudante_apurado[$i]) ? $bu_estudante_apurado[$i] : null;
                $data3['BU_PER_PRATA'] = isset($bu_prata_personalizado[$i]) ? $bu_prata_personalizado[$i] : null;
                $data3['BU_PER_ESTD'] = isset($bu_estudante_personalizado[$i]) ? $bu_estudante_personalizado[$i] : null;
                $data3['NOM_FUN'] = isset($bu_funcionario[$i]) ? $bu_funcionario[$i] : null;
                $data3['ID_FUN'] = isset($bu_idFun[$i]) ? $bu_idFun[$i] : null;
                $data3['ID_RFC'] = $id_rfc;

                $id_bu = $registrar->insertGuicheBus($data3);
            }
            // -----------------------------------GUICHE_DINHEIRO--------------------------------------------------------

            $din_prata_apurado = $_POST['din_prata_apurado'];
            $din_estudante_apurado = $_POST['din_estudante_apurado'];
            $din_prata_personalizado = $_POST['din_prata_personalizado'];
            $din_estudante_personalizado = $_POST['din_estudante_personalizado'];
            $din_comum = $_POST['din_comum'];
            $din_escolar = $_POST['din_escolar'];
            $din_fidelidade = $_POST['din_fidelidade'];
            $din_txcomum = $_POST['din_txcomum'];
            $din_txestudante = $_POST['din_txestudante'];
            $din_contado = $_POST['din_contado'];
            $din_funcionario = $_POST['din_funcionario'];
            $din_idFun = $_POST['din_idFun'];

            $cont3 = count($din_prata_apurado);

            for ($i = 0; $i < $cont3; $i++) {
                $data4['GUI_PRATA'] = isset($din_prata_apurado[$i]) ? $din_prata_apurado[$i] : null;
                $data4['GUI_ESTD'] = isset($din_estudante_apurado[$i]) ? $din_estudante_apurado[$i] : null;
                $data4['PRATA_PER'] = isset($din_prata_personalizado[$i]) ? $din_prata_personalizado[$i] : null;
                $data4['ESTD_PER'] = isset($din_estudante_personalizado[$i]) ? $din_estudante_personalizado[$i] : null;
                $data4['VL_COMUM'] = isset($din_comum[$i]) ? $din_comum[$i] : null;
                $data4['VL_ESCOLAR'] = isset($din_escolar[$i]) ? $din_escolar[$i] : null;
                $data4['VL_FIDELIDADE'] = isset($din_fidelidade[$i]) ? $din_fidelidade[$i] : null;
                $data4['TX_COMUM'] = isset($din_txcomum[$i]) ? $din_txcomum[$i] : null;
                $data4['TX_ESTUDANTE'] = isset($din_txestudante[$i]) ? $din_txestudante[$i] : null;
                $data4['CONTADO'] = isset($din_contado[$i]) ? $din_contado[$i] : null;
                $data4['NOM_FUN'] = isset($din_funcionario[$i]) ? $din_funcionario[$i] : null;
                $data4['ID_FUN'] = isset($din_idFun[$i]) ? $din_idFun[$i] : null;
                $data4['ID_RFC'] = $id_rfc;

                $id_din = $registrar->insertGuicheDin($data4);
            }
            // ----------------------------------------------DIFERENCA---------------------------------------------------

            // CALCULAR DIFERENCA DO PRATA

            $DIF_PRATA = floatval(array_sum($din_prata_apurado))  + floatval(array_sum($din_prata_personalizado)) + 
                floatval(array_sum($bu_prata_apurado)) + floatval(array_sum($bu_prata_personalizado)) +
                floatval(array_sum($cof_prata_personalizado)) + floatval(array_sum($pasta_prata_apurado)) + 
                floatval(array_sum($pasta_prata_personalizado));
            
                $DIF_PRATA4K = $DIF_PRATA - floatval($_POST['prata_personalizado']);

            $DIF_ESTUDANTE = floatval(array_sum($din_estudante_apurado)) + floatval(array_sum($din_estudante_personalizado)) +
                floatval(array_sum($bu_estudante_apurado)) + floatval(array_sum($bu_estudante_personalizado)) +
                floatval(array_sum($cof_estudante_personalizado)) + floatval(array_sum($pasta_estudante_apurado)) + 
                floatval(array_sum($pasta_estudante_personalizado));
               
                 $DIF_ESTD = $DIF_ESTUDANTE - floatval($_POST['estudante_personalizado']);

            $DIF_DEVOL = floatval($_POST['cof_prata_devolvido']) - floatval($_POST['prata_sa']);

            $DIFERENCA = ((floatval($data4['TX_COMUM']) * 30.80) + floatval($data4['TX_ESTUDANTE']) * 30.80) + floatval($data4['VL_COMUM']) +
                floatval($data4['VL_ESCOLAR']) + floatval($data4['VL_FIDELIDADE']) - floatval($data4['CONTADO']);

            $arrdif['DIF_PRATA'] = $DIF_PRATA4K;
            $arrdif['DIF_ESTD'] = $DIF_ESTD;
            $arrdif['DIFERENCA'] = $DIFERENCA;
            $arrdif['ID_RFC'] = $id_rfc;

            $registrar->insertDif($arrdif);

            $this->redirect('rfc?id=' . $id_rfc);
        } else {
            $error = $registrar->error;
        }


        $this->view('formulario', ['error' => $error]);
    }
};
