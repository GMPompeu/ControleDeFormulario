<?php

class Model extends Database
{
    public $error = array();

    protected $table = "acesso_form_rfc";
    protected $tableRfc = "formulario_fisc_rfc";
    function __construct()
    {
        if (!property_exists($this, 'table')) {
            $this->table = strtolower(get_class($this)) . "s";
        }
        if (!property_exists($this, 'tableRfc')) {
            $this->tableRfc = strtolower(get_class($this)) . "s";
        }
    }

    public function where($column, $value)
    {
        $column = addslashes($column);
        $query = "SELECT * FROM $this->table WHERE  $column = :value";
        return $this->query(
            $query,
            ['value' => $value]
        );
    }
    public function findAll()
    {
        $query = "SELECT * FROM $this->table";
        return $this->query($query);
    }

    public function update($id, $data)
    {
        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");

        $data['ID_USUARIO'] = $id;
        $query = "UPDATE $this->table set $str WHERE ID_USUARIO = :ID_USUARIO";

        return $this->query($query, $data);
    }

    public function delete($id)
    {
        $query = "DELETE from $this->table WHERE ID_USUARIO = :ID_USUARIO  ";
        $data['ID_USUARIO'] = $id;
        return $this->query($query, $data);
    }
    // ------------------------------------CADASTRAR USUARIO------------------------------------------------------
    public function insert($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO $this->table ($columns) values(:$values)";
        return $this->query($query, $data);
    }
    // ----------------------------------EQUIP_TRABALHO_RFC--------------------------------------------------------
    public function insertEquipTr($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO equip_trabalho_rfc ($columns) VALUES (:$values)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }
    // --------------------------------------OPERACAO_RFC--------------------------------------------------------
    public function insertOp($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO operacao_rfc ($columns) VALUES (:$values)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }

    // --------------------------------------POSTO_RH_RFC--------------------------------------------------------
    public function insertPostoRH($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO posto_rh_rfc ($columns) VALUES (:$values)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }

    // --------------------------------------TABELA SISTEMA_RFC--------------------------------------------------------

    public function insertSis($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO sistema_rfc ($columns) VALUES (:$values)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }

    // --------------------------------------TABELA FORMULARIO_FISC_RFC---------------------------------------------------


    public function insertRfc($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO formulario_fisc_rfc ($columns) VALUES (:$values)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }

    // ---------------------------------------TABELA PASTAS_RFC----------------------------------------------------------------

    public function insertCofre($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);
        $query = "INSERT INTO cofre_rfc ($columns) VALUES ($placeholders)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }


    // --------------------------------------COFRE_FISC----------------------------------------------------------------


    public function insertPasta($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);
        $query = "INSERT INTO pastas_rfc ($columns) VALUES ($placeholders)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }

    // --------------------------------------TABELA GUICHES_BUS_SPT----------------------------------------------------------------
    public function insertGuicheBus($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);
        $query = "INSERT INTO guiches_bus_spt ($columns) VALUES ($placeholders)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }


    // --------------------------------------TABELA GUICHES_DINHEIRO_RFC----------------------------------------------------------------

    public function insertGuicheDin($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $placeholders = ':' . implode(',:', $keys);
        $query = "INSERT INTO guiches_dinheiro_rfc ($columns) VALUES ($placeholders)";

        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                $lastInsertId = $conn->lastInsertId();
                return $lastInsertId;
            }
        }
        return false;
    }

    public function selectHomeform()
    {
        $query = "SELECT * FROM $this->tableRfc form JOIN status_rfc sts ON form.ID_STATUS = sts.ID_STATUS ORDER BY form.RFC DESC";
        return $this->query($query);
    }


    // -------------------------------------TABELA BASEADA NA PESQUISA----------------------------------------------------------------

    public function searchHomeForm($value)
    {
        $query = "SELECT * FROM $this->tableRfc form JOIN status_rfc sts ON form.ID_STATUS = sts.ID_STATUS WHERE form.RFC LIKE :value OR form.UNIDADE LIKE :value ORDER BY form.rfc DESC";
        return $this->query($query, ['value' => "%$value%"]);
    }

    // ----------------------------TABELA TAZENDO TODOS REGISTROS SELECIONAOD POR RFC----------------------------------------------------------------

    public function selectRfc($value)
    {
        $query = "SELECT DISTINCT RFC, UNIDADE, DTA_CRIACAO, DTA_VISITA, HR_CHEGADA,
        HR_SAIDA, COMENTDGQ, COMENTSPT, RESP_FINAL, GLOSA_DIF, 
        GLOSA_CRACHA, NOM_STATUS, NOM_RESP, USUARIO_NOM, PRONT_ONE,
        PRONT_THREE, PRONT_TWO, GUI_ATIVO, GUI_INATIVO, GUI_TOTAL,
        TB_ATIVO, TB_INATIVO, TB_TOTAL, TRI_ATIVO, TRI_INATIVO,
        TRI_TOTAL, EQUIPAMENTOS, NUM_CHAMADO, TEMPO, ENCARREGADO,
        CHAPA, ATENDENTES, TRIAGEM, J_APRENDIZ, UNIFORME, CRACHA, 
        NOM_FILE, SIS_PRATA, SIS_ESTD, SIS_DEVOL
        
        FROM $this->tableRfc form 
        JOIN acesso_form_rfc acess ON form.ID_USUARIO = acess.ID_USUARIO
        JOIN equip_trabalho_rfc equip ON form.ID_EQUIPE = equip.ID_EQUIPE
        JOIN operacao_rfc op ON form.ID_OPERACAO = op.ID_OPERACAO
        JOIN posto_rh_rfc rh ON form.ID_P_RH = rh.ID_P_RH	
        JOIN sistema_rfc sis ON form.ID_SISTEMA = sis.ID_SISTEMA
        JOIN status_rfc sts ON form.ID_STATUS = sts.ID_STATUS
        JOIN resp_rfc resp ON form.ID_RESP_SPT = resp.ID_RESP_SPT
        LEFT JOIN file_rfc  fil ON fil.ID_RFC = form.RFC 
        
        WHERE RFC = :value";
        return $this->query($query, ['value' => $value]);
    }

    // -------------TABELA TRAZENDO SOMA DE TODOS OS BILHES CAMPO GUICHE BASEADO NO RFC----------------------------------------------------------------

    public function selectGuiches($value)
    {
        $query = "SELECT DISTINCT	SUM(BU_PRATA) + SUM(BU_PER_PRATA) + GUI_PRATA + PRATA_PER AS GUICHE_PRATA,
		SUM(BU_ESTD) + SUM(BU_PER_ESTD) + GUI_ESTD + ESTD_PER AS GUICHE_ESTUDANTE
    FROM guiches_bus_spt GUI 
	JOIN $this->tableRfc FORM ON GUI.ID_RFC = FORM.RFC
    JOIN guiches_dinheiro_rfc DIN ON FORM.RFC = DIN.ID_RFC

	WHERE RFC = :value";
        return $this->query($query, ['value' => $value]);
    }

    // ---TABELA TRAZENDO SOMA DE TODOS OS BILHES CAMPO PASTAS E COFRE BASEADO NO RFC----------------------------------------------------------------
    public function selectPasta($value)
    {
        $query = "SELECT DISTINCT SUM(PASTA_PRATA) + SUM(PASTA_PER_PRATA) AS PASTA_PRATA,
            SUM(PASTA_ESTD) + SUM(PASTA_PER_ESTD) AS PASTA_ESTUDANTE,
            COF_PRATA, COF_ESTD, COF_DEVOLVIDOS, HOT_LIST
        FROM pastas_rfc PAS
            JOIN $this->tableRfc FORM ON PAS.ID_RFC = FORM.RFC
            JOIN cofre_rfc COF ON FORM.RFC = COF.ID_RFC
            WHERE RFC = :value";
            return $this->query($query, ['value' => $value]);
    }
    public function selecDinheiro($value){
        $query = "SELECT * FROM guiches_dinheiro_rfc DIN
        JOIN $this->tableRfc FORM ON DIN.ID_RFC = FORM.RFC 
        WHERE RFC = :value ";
        return $this->query($query, ['value' => $value]);; 
    }
    public function updateStatus($id, $data)
    {
        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");

        $data['ID_USUARIO'] = $id;
        $query = "UPDATE $this->table set $str WHERE  = :ID_USUARIO";

        return $this->query($query, $data);
    }

};
