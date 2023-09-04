<?php

class Usuario extends Model
{
    public function validate($DATA)
    {

        $this->error = array();

        if (empty($DATA['nom_usuario']) || !preg_match('/^[a-zA-Z\s]+$/', $DATA['nom_usuario'])) {
            $this->error['nom_usuario'] = "•Nome Usuario: este campo aceita apenas letras";
        }
        if (empty($DATA['senha']) || $DATA['senha']!= $DATA['senha2']) {
            $this->error['senha'] = "•Senha Usuario: os campos de senha devem estar iguais";
        }
        if (empty($DATA['usuario_email']) || !filter_var($DATA['usuario_email'], FILTER_VALIDATE_EMAIL)) {
            $this->error['usuario_email'] = "•Email Usuario: este e-mail não é valido ";
        }
        if($this->where('USUARIO_EMAIL', $DATA['usuario_email'])){
            $this->error['usuario_email']= "•Este e-mail já está cadastrado";
        }

        if (empty($DATA['nivel_acesso'])) {
            $this->error['nivel_acesso'] = "•Nivel de Acesso: campo Obrigatório";
        }
        if (count($this->error) == 0) {
            return true;
        }
        return false;
    }

    public function prontuario_id($data){
        if(isset($_SESSION['USUARIO']->USUARIO_LOGIN)){
            $data['chapa'] = $_SESSION['USUARIO']->USUARIO_LOGIN;

        }
    }
    
};
