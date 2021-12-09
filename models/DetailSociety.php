<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class DetailSociety extends Society{
    
    protected $_lastName;
    protected $_firstName;
    protected $_phone;
    protected $_email;

    private $_numbers;
    private $_dates;
    private $_societyName;
    
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

    //!==========================================| Invoices |==========================================
    //* ==========| Setters |==========
    public function setNumbers($numbers){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($numbers)) $this->_numbers = $numbers;
    }
    public function setDates($dates){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($dates)) $this->_dates = $dates;
    }
    public function setSocietyName($societyName){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($societyName)) $this->_societyName = $societyName;
    }

    //* ==========| Getters |==========
    public function numbers()     { return $this->_numbers;     }
    public function dates()       { return $this->_dates;       }
    public function societyName() { return $this->_societyName; }
    //?================================================================================================
}

