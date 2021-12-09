<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class Society {
    private $_id;
    private $_name;
    private $_vat;
    private $_country;
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
    public function setName($name){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($name)) $this->_name = $name;
    }
    public function setVat($vat){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($vat)) $this->_vat = $vat;
    }
    public function setCountry($country){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($country)) $this->_country = $country;
    }
    public function setType($type){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($type)) $this->_type = $type;
    }

    //* ==========| Getters |==========
    public function id()      { return $this->_id;      }
    public function vat()     { return $this->_vat;     }
    public function name()    { return $this->_name;    }
    public function country() { return $this->_country; }
    public function type()    { return $this->_type;    }
    
}

