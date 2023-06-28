<?php

class Database
{

    protected function connect()
    {
        $string = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
        if (!$conn = new PDO($string, DBUSER, DBPASSWORD)) {
            die("Não foi possivel conectar ao banco de dados :,(");
        }
        return $conn;
    }

    public function query($query, $data = array(), $data_type ="object")
    {
        $conn = $this->connect();
        $stm = $conn->prepare($query);

        if ($stm) {
            $checar = $stm->execute($data);
            if ($checar) {
                if ($data_type == "object") {
                    $data = $stm->fetchAll(PDO::FETCH_OBJ);
                } else {
                    $data = $stm->fetchAll(PDO::FETCH_ASSOC);
                }
                if (is_array($data) && count($data) > 0) {
                    return $data;
                }
            }
        }
        return false;
    }

}
