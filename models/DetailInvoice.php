<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class DetailInvoice extends Invoice{
    
    protected $_lastName;
    protected $_firstName;
    protected $_phone;
    protected $_email;
    
    private $_name;
    private $_vat;
    

    //!==========================================| Contacts |==========================================
        //* ==========| Setters |==========
        public function setLastName($lastName){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($lastName)) $this->_lastName = $lastName;
        }
        public function setFirstName($firstName){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($firstName)) $this->_firstName = $firstName;
        }
        public function setPhone($phone){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($phone)) $this->_phone = $phone;
        }
        public function setEmail($email){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($email)) $this->_email = $email;
        }
        
        //* ==========| Getters |==========
        public function lastName()    { return $this->_lastName;    }
        public function firstName()   { return $this->_firstName;   }
        public function phone()       { return $this->_phone;       }
        public function email()       { return $this->_email;       }
    //?================================================================================================
    //!==========================================| Societies |==========================================
        //* ==========| Setters |==========
        public function setName($name){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($name)) $this->_name = $name;
        }
        public function setVat($vat){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($vat)) $this->_vat = $vat;
        }
        
        //* ==========| Getters |==========
        public function vat()     { return $this->_vat;     }
        public function name()    { return $this->_name;    }
    //?================================================================================================
    

}