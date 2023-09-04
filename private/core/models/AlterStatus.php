<?php

class AlterStatus extends Model
{
    public $errorAcess = array();
    public $errorConf = array();


    public function validateConc($data)
    {
        $acess = new Auth();
        $this->errorAcess = array();

        if ($acess->acess() == 3 && isset($data['respDGQ']) && empty($data['respDGQ'])) {
            $this->errorAcess['respDGQ'] = "CAMPO OBRIGATORIO";
        } elseif ($acess->acess() != 3 ) {
            $this->errorAcess['respDGQ'] = "Você não tem acesso a esse item!";
        }

        return empty($this->errorAcess);
    }
    public function validateAtend($data)
    {

        $acess = new Auth();
        $this->errorAcess = array();

        if ($acess->acess() == 3 && isset($data['atendimento']) && empty($data['atendimento'])) {
            $this->errorAcess['atendimento'] = "Erro";
        } elseif ($acess->acess() != 3 ) {
            $this->errorAcess['atendimento'] = "Você não tem acesso a esse item!";
        }

        return empty($this->errorAcess);
    }
    public function validateAguard($data)
    {
        $acess = new Auth();
        $this->errorAcess = array();

        if ($acess->acess() == 3 && isset($data['aguardando']) && empty($data['aguardando'])) {
            $this->errorAcess['aguardando'] = "Erro";
        } elseif ($acess->acess() != 3 ) {
            $this->errorAcess['aguardando'] = "Você não tem acesso a esse item!";
        }
        return empty($this->errorAcess);
    }

    public function validateNaoconf($data)
    {
        $acess = new Auth();
        $this->errorConf = array();

        if ($acess->acess() == 4 && isset($data['respSP']) && empty($data['respSPT'])) {
            $this->errorConf['respSPT'] = "Campo de Resposta Obrigatorio";
        } elseif ($acess->acess() != 4 ) {
            $this->errorConf['respSPT'] = "Você não tem acesso a esse item!";
        }
        return empty($this->errorConf);
    }
    public function validateConf($data) 
    {
        $acess = new Auth();
        $this->errorConf = array();

        if ($acess->acess() == 4 && isset($data['conf']) && empty($data['conf'])) {
            $this->errorConf['conf'] = "Error!";
        } elseif ($acess->acess() != 4  ) {
            $this->errorConf['conf'] = "Você não tem acesso a esse item!";
        }
        return empty($this->errorConf);
    }

    public function validateIdf($data)
    {
        $acess = new Auth();
        $this->errorConf = array();

        if ($acess->acess() == 4 && isset($data['indefinido']) && empty($data['indefinido'])){
            $this->errorConf['indefinido'] = "Error!";
        }elseif ($acess->acess() != 4){
            $this->errorConf['indefinido'] = "Você não tem acesso a esse item!";
        }
        return empty($this->errorConf);
    }
}
