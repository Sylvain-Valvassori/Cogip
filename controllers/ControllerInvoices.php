<?php
require_once('views/View.php');

class ControllerInvoices {

    private $_invoiceManager; // nouvelle instance pour accéder  aux fonctions
    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la fonction private
    public function __construct($url){
        if (isset($url) && count(array($url) ) > 1) {
            throw new Exception('Page not found');
        } else {
            // $this->contacts();
            // $this->invoices();
            $this->invoices();
        }
    }

     //* ==========| Invoices |==========
    private function invoices(){
        $this->_invoiceManager = new InvoiceManager; 
        // getInvoices() c'est la méthode extand dans le datasManager
        $invoices = $this->_invoiceManager->getInvoices();

        $this->_view = new View('Invoices');
        $this->_view->generate(array('invoices' => $invoices));
    }
    
}


