<?php

class Registrar extends Model
{

    private $fiscal = '';
    private $fiscalII = '';
    private $fiscalIII = '';
    public function validade($DATA)
    {

        $this->error = array();

        if (empty($DATA['firstPront'])) {
            $this->error['firstPront'] = "Por favor certifique que todos os dados estão preenchidos!";
        } elseif ($DATA['firstPront'] == '1011405') {
            $this->fiscal = "Aluisio Pereira";
        } elseif ($DATA['firstPront'] == '0860620') {
            $this->fiscal = "Josenildo B. Amorim";
        } elseif ($DATA['firstPront'] == '1209890') {
            $this->fiscal = "Decio Satuki";
        } elseif ($DATA['firstPront'] == '1229656') {
            $this->fiscal = "Jesus Silva Costa";
        } elseif ($DATA['firstPront'] == '1229982') {
            $this->fiscal = "Newton T. Archina";
        } elseif ($DATA['firstPront'] == '1230514') {
            $this->fiscal = "Antonio Mario Quirino";
        } elseif ($DATA['firstPront'] == '1230964') {
            $this->fiscal = "Gercio Moela";
        } elseif ($DATA['firstPront'] == '1050250') {
            $this->fiscal = "Pedro G. da Silva";
        } elseif ($DATA['firstPront'] == '0931993') {
            $this->fiscal = "Juscelino F. da Silva";
        } elseif ($DATA['firstPront'] == '1229095') {
            $this->fiscal = "Clovis Trapia";
        } elseif ($DATA['firstPront'] == '1232673') {
            $this->fiscal = "Jeova G. de Almeida";
        } elseif ($DATA['firstPront'] == '1234749') {
            $this->fiscal = "Albert Pavilonis Neto";
        } elseif ($DATA['firstPront'] == '1234760') {
            $this->fiscal = "Ademir dos Santos";
        }


        if (empty($DATA['secondPront'])) {
            $this->error['secondPront'] = "Por favor certifique que todos os dados estão preenchidos!";
        } elseif ($DATA['secondPront'] == '1011405') {
            $this->fiscalII = "Aluisio Pereira";
        } elseif ($DATA['secondPront'] == '0860620') {
            $this->fiscalII = "Josenildo B. Amorim";
        } elseif ($DATA['secondPront'] == '1209890') {
            $this->fiscalII = "Decio Satuki";
        } elseif ($DATA['secondPront'] == '1229656') {
            $this->fiscalII = "Jesus Silva Costa";
        } elseif ($DATA['secondPront'] == '1229982') {
            $this->fiscalII = "Newton T. Archina";
        } elseif ($DATA['secondPront'] == '1230514') {
            $this->fiscalII = "Antonio Mario Quirino";
        } elseif ($DATA['secondPront'] == '1230964') {
            $this->fiscalII = "Gercio Moela";
        } elseif ($DATA['secondPront'] == '1050250') {
            $this->fiscalII = "Pedro G. da Silva";
        } elseif ($DATA['secondPront'] == '0931993') {
            $this->fiscalII = "Juscelino F. da Silva";
        } elseif ($DATA['secondPront'] == '1229095') {
            $this->fiscalII = "Clovis Trapia";
        } elseif ($DATA['secondPront'] == '1232673') {
            $this->fiscalII = "Jeova G. de Almeida";
        } elseif ($DATA['secondPront'] == '1234749') {
            $this->fiscalII = "Albert Pavilonis Neto";
        } elseif ($DATA['secondPront'] == '1234760') {
            $this->fiscalII = "Ademir dos Santos";
        }

        if (empty($DATA['thirdPront'])) {
            $this->error['thirdPront'] = "Por favor certifique que todos os dados estão preenchidos!";
        } elseif ($DATA['thirdPront'] == '1011405') {
            $this->fiscalIII = "Aluisio Pereira";
        } elseif ($DATA['thirdPront'] == '0860620') {
            $this->fiscalIII = "Josenildo B. Amorim";
        } elseif ($DATA['thirdPront'] == '1209890') {
            $this->fiscalIII = "Decio Satuki";
        } elseif ($DATA['thirdPront'] == '1229656') {
            $this->fiscalIII = "Jesus Silva Costa";
        } elseif ($DATA['thirdPront'] == '1229982') {
            $this->fiscalIII = "Newton T. Archina";
        } elseif ($DATA['thirdPront'] == '1230514') {
            $this->fiscalIII = "Antonio Mario Quirino";
        } elseif ($DATA['thirdPront'] == '1230964') {
            $this->fiscalIII = "Gercio Moela";
        } elseif ($DATA['thirdPront'] == '1050250') {
            $this->fiscalIII = "Pedro G. da Silva";
        } elseif ($DATA['thirdPront'] == '0931993') {
            $this->fiscalIII = "Juscelino F. da Silva";
        } elseif ($DATA['thirdPront'] == '1229095') {
            $this->fiscalIII = "Clovis Trapia";
        } elseif ($DATA['thirdPront'] == '1232673') {
            $this->fiscalIII = "Jeova G. de Almeida";
        } elseif ($DATA['thirdPront'] == '1234749') {
            $this->fiscalIII = "Albert Pavilonis Neto";
        } elseif ($DATA['thirdPront'] == '1234760') {
            $this->fiscalIII = "Ademir dos Santos";
        }


        if (count($this->error) == 0) {
            return true;
        }
        return false;
    }
    public function getFiscal()
    {
        return $this->fiscal;
    }
    public function getFiscalII()
    {
        return $this->fiscalII;
    }
    public function getFiscalIII()
    {
        return $this->fiscalIII;
    }
}
