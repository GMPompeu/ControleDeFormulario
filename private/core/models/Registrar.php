<?php

    class Registrar extends Model{
        
        public function validade($DATA){

            $this->error = array();
            if(empty($DATA['firstPront'])){
                $this->error['firstPront'] = "Por favor certifique que todos os dados estão preenchidos!";
            }
            if(count($this->error) == 0){   
                return true;
            }
            return false;
        }
    }