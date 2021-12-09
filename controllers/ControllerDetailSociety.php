<?php
require_once('views/View.php');

class ControllerDetailSociety {

    private $_detailSocietyManager; // nouvelle instance pour accéder  aux fonctions
    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la méthode detailSociety()
    public function __construct($url){
         if (isset($url[0]) && count(array($url) ) > 1) {
            throw new Exception('Page not found controller');
        } else {
            $this->detailSociety();
        }
    }

    //* ==========| Societys |==========
    private function detailSociety(){
        $this->_detailSocietyManager = new DetailSocietyManager; 
        // getDetailSociety() c'est la méthode extand dans le DetailSocietyManager
        $detailSociety = $this->_detailSocietyManager->getDetailSociety();

        $this->_view = new View('DetailSociety');
        $this->_view->generate(array('detailSociety' => $detailSociety));
    }
}