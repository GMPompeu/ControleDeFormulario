<?php

class modelDash extends Database
{
    function mensal()
    {
        $query="SELECT * FROM formulario_fisc_rfc;";
        return $this->query($query);
    }
    // -------------------------------------GLOSA PRATA--------------------------------------
    function prataFaltante($month)
    {
        $query = "SELECT SUM(dr.DIF_PRATA) AS DIF_PRATA
        FROM formulario_fisc_rfc fr
        JOIN diferenca_rfc dr ON fr.RFC = dr.ID_RFC
        WHERE fr.GLOSA_PRATA = 1 AND DIF_PRATA < 0 AND MONTH(fr.DTA_CRIACAO) = '$month';";

        return $this->query($query);
    }
    function prataBetween($firstDate, $endDate)
    {

        $query = "SELECT SUM(dr.DIF_PRATA) AS DIF_PRATA
        FROM formulario_fisc_rfc fr
        JOIN diferenca_rfc dr ON fr.RFC = dr.ID_RFC
        WHERE fr.GLOSA_PRATA = 1 AND DIF_PRATA < 0
        AND fr.DTA_CRIACAO BETWEEN '$firstDate' AND '$endDate';";

        return $this->query($query);
    }

    // -------------------------------------GLOSA ESTUDANTE --------------------------------------------------------
    function estudanteFaltante($month)
    {
        $query = "SELECT SUM(dr.DIF_ESTD) AS DIF_ESTD
        FROM formulario_fisc_rfc fr
        JOIN diferenca_rfc dr ON fr.RFC = dr.ID_RFC
        WHERE fr.GLOSA_ESTUDANTE = 1 AND DIF_ESTD < 0 AND MONTH(fr.DTA_CRIACAO) = '$month';";

        return $this->query($query);
    }

    function estudanteBetween($firstDate, $endDate)
    {
        $query = "SELECT SUM(dr.DIF_ESTD) AS DIF_ESTD
        FROM formulario_fisc_rfc fr
        JOIN diferenca_rfc dr ON fr.RFC = dr.ID_RFC
        WHERE fr.GLOSA_ESTUDANTE = 1 AND DIF_ESTD < 0
        AND fr.DTA_CRIACAO BETWEEN '$firstDate' AND '$endDate';";

        return $this->query($query);
    }

    // -----------------------------------------GLOSA DIFERENCA -------------------------------------------------
    function diferenca($month)
    {
        $query = "SELECT SUM(dr.DIFERENCA) AS DIFERENCA
        FROM formulario_fisc_rfc fr
        JOIN diferenca_rfc dr ON fr.RFC = dr.ID_RFC
        WHERE fr.GLOSA_TOTAL = 1 AND DIFERENCA < 0 AND MONTH(fr.DTA_CRIACAO) = '$month';";

        return $this->query($query);
    }

    function diferencaBetween($firstDate, $endDate)
    {
        $query = "SELECT SUM(dr.DIFERENCA) AS DIFERENCA
        FROM formulario_fisc_rfc fr
        JOIN diferenca_rfc dr ON fr.RFC = dr.ID_RFC
        WHERE fr.GLOSA_TOTAL = 1 AND DIFERENCA < 0
        AND fr.DTA_CRIACAO BETWEEN '$firstDate' AND '$endDate';";

        return $this->query($query);
    }


    // -------------------------------------GLOSA CRACHA ----------------------------------------
    function cracha($month)
    {
        $query = "SELECT SUM(CRACHA) - (SUM(ATENDENTES) + SUM(TRIAGEM) + SUM(J_APRENDIZ)) AS DIF_CRACHA
        FROM formulario_fisc_rfc fr
        LEFT JOIN posto_rh_rfc rh ON fr.ID_P_RH = rh.ID_P_RH
        WHERE fr.GLOSA_CRACHA = 1 AND MONTH(fr.DTA_CRIACAO) = '$month';";

        return $this->query($query);
    }
    function crachaBetween($firstDate, $endDate)
    {
        $query = "SELECT SUM(CRACHA) - (SUM(ATENDENTES) + SUM(TRIAGEM) + SUM(J_APRENDIZ)) AS DIF_CRACHA
        FROM formulario_fisc_rfc fr
        LEFT JOIN posto_rh_rfc rh ON fr.ID_P_RH = rh.ID_P_RH
        WHERE fr.GLOSA_CRACHA = 1
        AND fr.DTA_CRIACAO BETWEEN '$firstDate' AND '$endDate';";

        return $this->query($query);
    }


    // ---------------------------------------------RFC ----------------------------------------
    function rfc($month)
    {
        $query = "SELECT fr.*, 
        COALESCE(
            (SELECT ABS(SUM(DIF_PRATA))
             FROM diferenca_rfc
             WHERE ID_RFC = fr.RFC AND GLOSA_PRATA = 1 AND DIF_PRATA < 0), 0) AS SOMA_DIF_PRATA,
        COALESCE(
            (SELECT ABS(SUM(DIF_ESTD))
             FROM diferenca_rfc
             WHERE ID_RFC = fr.RFC AND GLOSA_ESTUDANTE = 1 AND DIF_ESTD < 0), 0) AS SOMA_DIF_ESTD,
        COALESCE(
            (SELECT ABS(SUM(DIFERENCA))
             FROM diferenca_rfc
             WHERE ID_RFC = fr.RFC AND GLOSA_TOTAL = 1 AND DIFERENCA < 0), 0) AS SOMA_DIFERENCA,
        COALESCE(
            (SELECT ABS((SUM(ATENDENTES) + SUM(TRIAGEM) + SUM(J_APRENDIZ)) - SUM(CRACHA))
             FROM posto_rh_rfc
             WHERE ID_P_RH = fr.ID_P_RH AND GLOSA_CRACHA = 1), 0) AS SOMA_DIF_CRACHA,
             (SELECT st.NOM_STATUS 
             FROM status_rfc st
             WHERE fr.ID_STATUS = st.ID_STATUS) AS NOM_STATUS,
             (SELECT RE.NOM_RESP
             FROM resp_rfc re
             WHERE fr.ID_RESP_SPT = re.ID_RESP_SPT) AS NOM_RESP,
             (SELECT st.NOM_STATUS 
            FROM status_rfc st
            WHERE fr.ID_STATUS = st.ID_STATUS) AS NOM_STATUS,
            (SELECT RE.NOM_RESP
             FROM resp_rfc re
             WHERE fr.ID_RESP_SPT = re.ID_RESP_SPT) AS NOM_RESP
             FROM formulario_fisc_rfc fr
             WHERE MONTH(fr.DTA_CRIACAO) = '$month';";

        return $this->query($query);
    }
    function rfcbetween($firstDate, $endDate)
    {
        $query = "SELECT fr.*, 
        COALESCE(
            (SELECT ABS(SUM(DIF_PRATA))
             FROM diferenca_rfc
             WHERE ID_RFC = fr.RFC AND GLOSA_PRATA = 1 AND DIF_PRATA < 0), 0) AS SOMA_DIF_PRATA,
        COALESCE(
            (SELECT ABS(SUM(DIF_ESTD))
             FROM diferenca_rfc
             WHERE ID_RFC = fr.RFC AND GLOSA_ESTUDANTE = 1 AND DIF_ESTD < 0), 0) AS SOMA_DIF_ESTD,
        COALESCE(
            (SELECT ABS(SUM(DIFERENCA)) 
             FROM diferenca_rfc
             WHERE ID_RFC = fr.RFC AND GLOSA_TOTAL = 1 AND DIFERENCA < 0), 0) AS SOMA_DIFERENCA,
        COALESCE(
            (SELECT (SUM(ATENDENTES) + SUM(TRIAGEM) + SUM(J_APRENDIZ)) - SUM(CRACHA)
             FROM posto_rh_rfc
             WHERE ID_P_RH = fr.ID_P_RH AND GLOSA_CRACHA = 1), 0) AS SOMA_DIF_CRACHA,
            (SELECT st.NOM_STATUS 
            FROM status_rfc st
            WHERE fr.ID_STATUS = st.ID_STATUS) AS NOM_STATUS,
            (SELECT RE.NOM_RESP
            FROM resp_rfc re
            WHERE fr.ID_RESP_SPT = re.ID_RESP_SPT) AS NOM_RESP
            FROM formulario_fisc_rfc fr
            WHERE fr.DTA_CRIACAO BETWEEN '$firstDate' AND '$endDate' ;";
        return $this->query($query);
    }
}
