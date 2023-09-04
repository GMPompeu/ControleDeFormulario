<?php 

class Auth extends Controller{

    public static function authenticate ($row){

        $_SESSION['USUARIO'] = $row;
    }
    public static function logout (){

        if(isset ($_SESSION['USUARIO']) ){
            unset($_SESSION['USUARIO']);
        }
    }
    public static function loggetin (){

        if(isset ($_SESSION['USUARIO']) ){
           return true;
        }
        return false;
    } 
    public static function user (){

        if(isset ($_SESSION['USUARIO']) ){
           return $_SESSION['USUARIO']->USUARIO_NOM;
        }
        return false;
    }
    public static function acess()
    {
        $usuario = new Usuario();
        $acesso = $_SESSION['USUARIO']->USUARIO_LOGIN;
        $row = $usuario->where('USUARIO_LOGIN', $acesso);

        if (!empty($row)) {
            return $row[0]->NIVEL_ACESSO;
        }

        return null;
    }
    public static function idfativo()
    {
        $usuario = new Usuario();
        $idf = $_SESSION['USUARIO']->USUARIO_LOGIN;
        $row = $usuario->where('USUARIO_LOGIN', $idf);

        if (!empty($row)){
            return $row[0]->IDF_ATIVO;
        }
        return null;
    }
}