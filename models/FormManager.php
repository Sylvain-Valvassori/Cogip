<?php 

class FormManager extends Model{

    public function getForm(){
        
        $this->FormInvoice();
        $this->FormContact();
        $this->FormSociety();
        
    }

    
}


