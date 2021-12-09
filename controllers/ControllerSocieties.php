<?php
require_once('views/View.php');

class ControllerSocieties {

    private $_societyManager; // nouvelle instance pour accéder  aux fonctions
    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la fonction private
    public function __construct($url){
        if (isset($url) && count(array($url) ) > 1) {
            throw new Exception('Page not found');
        } else {
            $this->societies();
        }
    }

    //* ==========| Societies |==========
    private function societies(){
        $this->_societyManager = new SocietyManager; 
        // getSocieties() c'est la méthode extand dans le SocietyManager
        $societies = $this->_societyManager->getSocieties();

        $this->_view = new View('Societies');
        $this->_view->generate(array('societies' => $societies));
    } 
}


