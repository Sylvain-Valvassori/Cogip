<?php
require_once('views/View.php');

class ControllerDetailInvoice {

    private $_detailInvoiceManager; // nouvelle instance pour accéder  aux fonctions
    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la méthode detailInvoice()
    public function __construct($url){
         if (isset($url[0]) && count(array($url) ) > 1) {
            throw new Exception('Page not found controller');
        } else {
            $this->detailInvoice();
        }
    }

    //* ==========| Invoices |==========
    private function detailInvoice(){
        $this->_detailInvoiceManager = new DetailInvoiceManager; 
        // getDetailInvoice() c'est la méthode extand dans le DetailInvoiceManager
        $detailInvoice = $this->_detailInvoiceManager->getDetailInvoice();

        $this->_view = new View('DetailInvoice');
        $this->_view->generate(array('detailInvoice' => $detailInvoice));
    }
}