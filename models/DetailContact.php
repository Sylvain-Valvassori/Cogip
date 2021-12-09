<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class DetailContact extends contact{
    
    private $_numbers;
    private $_dates;
    
    //* ==========| Setters, les installeurs |==========
   
        //* ==========| Invoice Infos |==========
        public function setNumbers($numbers){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($numbers)) $this->_numbers = $numbers;
        }
        public function setDates($dates){
            //test si c'est une chaine de caractère, si oui on met le private à jour
            if(is_string($dates)) $this->_dates = $dates;
        }
    

    //* ==========| Getters |==========
        //* ==========| Invoice Infos |==========
        public function numbers() { return $this->_numbers; }
        public function dates()   { return $this->_dates;   }
}