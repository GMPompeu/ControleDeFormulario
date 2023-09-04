<?php

class SelectRfc extends Model{
    
    public function validate($DATA){
        $this->error = array();

        if(empty($DATA['id'])){
            
            $this->error['id'] = "Falha na pesquisa!";
        }return false;
        
    }
}