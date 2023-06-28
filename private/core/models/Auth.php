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
}