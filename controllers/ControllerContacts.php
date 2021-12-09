<?php
require_once('views/View.php');


class ControllerContacts {

    private $_contactManager; // nouvelle instance pour accéder  aux fonctions
    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la fonction private
    public function __construct($url){
        if (isset($url) && count(array($url) ) > 1) {
            throw new Exception('Page not found');
        } else {
            $this->contacts();
        }
    }

    //* ==========| Contacts |==========
    private function contacts(){
        $this->_contactManager = new ContactManager; 
        // getContacts() c'est la méthode extand dans le datasManager
        $contacts = $this->_contactManager->getContacts();

        $this->_view = new View('Contacts');
        $this->_view->generate(array('contacts' => $contacts));
    }
}


