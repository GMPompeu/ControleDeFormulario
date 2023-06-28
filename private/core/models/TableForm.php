<?php 

class TableForm extends Model {
    
    public function validate($DATA){

        $this->error = array();

        if(empty($this->searchHomeForm($DATA))){
            $this->error;
        }
        if (count($this->error) == 0){
            return true;
        }
        return false;
    }

}