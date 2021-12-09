<?php
require_once('views/View.php');

class ControllerDetailContact {

    private $_detailContactManager; // nouvelle instance pour accéder  aux fonctions
    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la méthode detailContact()
    public function __construct($url){
         if (isset($url[0]) && count(array($url) ) > 1) {
            throw new Exception('Page not found controller');
        } else {
            $this->detailContact();
        }
    }

    //* ==========| Contacts |==========
    private function detailContact(){
        $this->_detailContactManager = new DetailContactManager; 
        // getDetailContact() c'est la méthode extand dans le DetailContactManager
        $detailContact = $this->_detailContactManager->getDetailContact();

        $this->_view = new View('DetailContact');
        $this->_view->generate(array('detailContact' => $detailContact));
    }
}