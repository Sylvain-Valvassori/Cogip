<?php
// on va récupérer  toutes les données de manière sécurisé, on va les Hydrater

class Contact {
    protected $_id;
    protected $_lastName;
    protected $_firstName;
    protected $_phone;
    protected $_email;
    protected $_societyName;


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
    public function setSocietyName($societyName){
        //test si c'est une chaine de caractère, si oui on met le private à jour
        if(is_string($societyName)) $this->_societyName = $societyName;
    }

    //* ==========| Getters |==========
    public function id()          { return $this->_id;          }
    public function lastName()    { return $this->_lastName;    }
    public function firstName()   { return $this->_firstName;   }
    public function phone()       { return $this->_phone;       }
    public function email()       { return $this->_email;       }
    public function societyName() { return $this->_societyName; }
}

