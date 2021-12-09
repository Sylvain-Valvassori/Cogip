<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class Invoice {
    private $_id;
    private $_numbers;
    private $_dates;
    private $_societyName;
    private $_type;


    //* ==========| Constructeur |==========
    // en paramètre, les données récupérés du fichier Model.php => $objectName($data);
    public function __construct(array $data){
        $this->hydrate($data);
    }
    //* ==========| Hydratation |==========
    public function hydrate(array $data){
        foreach($data as $key => $value){
            $method = 'set'.ucfirst($key);

            if(method_exists($this, $method)) $this->$method($value);
        }
    }

    //* ==========| Setters, les installeurs |==========
    public function setId($id){
        $id = (int) $id;
        //si l'attribut(variable) est respecté alors l'attribut private $_id sera à jour sinon non
        if($id > 0) $this->_id = $id;
    }
    public function setNumbers($numbers){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($numbers)) $this->_numbers = $numbers;
    }
    public function setDates($dates){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($dates)) $this->_dates = $dates;
    }
    public function setType($type){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($type)) $this->_type = $type;
    }
    public function setSocietyName($societyName){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($societyName)) $this->_societyName = $societyName;
    }

    //* ==========| Getters |==========
    public function id()          { return $this->_id;          }
    public function numbers()     { return $this->_numbers;     }
    public function dates()       { return $this->_dates;       }
    public function type()        { return $this->_type;        }
    public function societyName() { return $this->_societyName; }
    
    
}

