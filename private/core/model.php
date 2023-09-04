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

    // -------------------------------------TABELA BASEADA NA PESQUISA----------------------------------------------------------------

    public function pagesHomeForm($value, $indiceInicio, $itensPorPagina)
    {
        $query = "SELECT * FROM $this->tableRfc form JOIN status_rfc sts ON form.ID_STATUS = sts.ID_STATUS WHERE form.RFC LIKE :value OR form.UNIDADE LIKE :value ORDER BY form.rfc DESC LIMIT $indiceInicio, $itensPorPagina";
        return $this->query($query, ['value' => "%$value%"]);
    }

    // ------------------------------------ALTERAR STATUS-------------------------------------------------------------
    public function updateConcluir($rfc, $data)
    {
        $str = "";
        foreach ($data as $key => $value) {
            $str .= $key . "=:" . $key . ",";
        }
        $str = trim($str, ",");

        $data['RFC'] = $rfc;
        $query = "UPDATE formulario_fisc_rfc SET $str WHERE RFC = :RFC";

        return $this->query($query, $data);
    }

    public function insertDif($data)
    {
        $keys = array_keys($data);
        $columns = implode(',', $keys);
        $values = implode(',:', $keys);
        $query = "INSERT INTO diferenca_rfc ($columns) VALUES (:$values)";

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

    // ----------------------------TABELA TAZENDO TODOS REGISTROS SELECIONAOD POR RFC----------------------------------------------------------------

    public function selectRfc($value)
    {
        $query = "SELECT DISTINCT RFC, UNIDADE, DTA_CRIACAO, DTA_VISITA, HR_CHEGADA,
        HR_SAIDA, COMENTDGQ, COMENTSPT, RESP_FINAL, GLOSA_CRACHA, NOM_STATUS, NOM_RESP, 
        USUARIO_NOM, NOM_ONE, NOM_TWO, NOM_THREE,
        PRONT_ONE,PRONT_THREE, PRONT_TWO, GUI_ATIVO, GUI_INATIVO, GUI_TOTAL,
        TB_ATIVO, TB_INATIVO, TB_TOTAL, TRI_ATIVO, TRI_INATIVO,
        TRI_TOTAL, EQUIPAMENTOS, NUM_CHAMADO, TEMPO, ENCARREGADO,
        CHAPA, ATENDENTES, TRIAGEM, J_APRENDIZ, UNIFORME, CRACHA, 
        NOM_FILE, SIS_PRATA, SIS_ESTD, SIS_DEVOL, CONTADO, TX_COMUM, TX_ESTUDANTE,
        VL_COMUM, VL_ESCOLAR, VL_FIDELIDADE
        
        FROM $this->tableRfc form 
        JOIN acesso_form_rfc acess ON form.ID_USUARIO = acess.ID_USUARIO
        JOIN equip_trabalho_rfc equip ON form.ID_EQUIPE = equip.ID_EQUIPE
        JOIN operacao_rfc op ON form.ID_OPERACAO = op.ID_OPERACAO
        JOIN posto_rh_rfc rh ON form.ID_P_RH = rh.ID_P_RH	
        JOIN sistema_rfc sis ON form.ID_SISTEMA = sis.ID_SISTEMA
        JOIN status_rfc sts ON form.ID_STATUS = sts.ID_STATUS
        JOIN resp_rfc resp ON form.ID_RESP_SPT = resp.ID_RESP_SPT
        JOIN guiches_dinheiro_rfc DIN ON form.RFC = DIN.ID_RFC
        LEFT JOIN file_rfc  fil ON fil.ID_RFC = form.RFC 
        
        WHERE RFC = :value";
        return $this->query($query, ['value' => $value]);
    }

    // -------------SOMANDO BILHETES PRATA/ESTUDANTE TABELA GUICHES_BUS_SPT----------------------------------------------------------------
    public function bu_gui($value)
    {
        $query = " SELECT (SUM(BU_PRATA) + SUM(BU_PER_PRATA)) AS PRATA_GUI,
          (SUM(BU_ESTD) + SUM(BU_PER_ESTD)) AS ESTD_GUI
          FROM guiches_bus_spt WHERE ID_RFC = :value";

        return $this->query($query, ['value' => $value]);
    }
    // -------------SOMANDO BILHETES PRATA TABELA GUICHES_BUS_SPT----------------------------------------------------------------

    public function gui_din($value)
    {
        $query = "SELECT (SUM(GUI_PRATA) + SUM(PRATA_PER)) AS PRATA_DIN,
        (SUM(GUI_ESTD) + SUM(ESTD_PER)) AS ESTD_DIN
        FROM guiches_dinheiro_rfc WHERE ID_RFC = :value";

        return $this->query($query, ['value' => $value]);
    }
    public function pasta($value)
    {
        $query = "SELECT (SUM(PASTA_PRATA) + SUM(PASTA_PER_PRATA)) AS PRATA_PASTA,
        (SUM(PASTA_ESTD) + SUM(PASTA_PER_ESTD)) AS ESTD_PASTA
        FROM pastas_rfc WHERE ID_RFC = :value";

        return $this->query($query, ['value' => $value ]);
    }

    public function cofre($value)
    {
        $query = "SELECT SUM(COF_PRATA) AS COF_PRATA,SUM(COF_ESTD) AS COF_ESTD, COF_DEVOLVIDOS, HOT_LIST
         FROM cofre_rfc WHERE ID_RFC = :value";

        return $this->query($query, ['value' => $value]);
    }

};
