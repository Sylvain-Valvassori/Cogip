<?php
require_once('views/View.php');

class ControllerHome {

    private $_contactManager; // nouvelle instance pour accéder  aux fonctions
    private $_invoiceManager;
    private $_societyManager;
    private $_formManager;

    private $_view;

    //on lance le constructeur et on récupère l'URL et si le test est ok on appel la fonction private
    public function __construct($url){
        if (isset($url) && count(array($url) ) > 1) {
            throw new Exception('Page not found');
        } else {
            $this->home();
        }
    }

    //  //* ==========| Home |==========
    private function home(){

        //* ==========| Contacts |==========
        $this->_contactManager = new ContactManager; 
        // getContacts() c'est la méthode extand dans le datasManager
        $contacts = $this->_contactManager->getFiveContacts();


        //* ==========| Invoices |==========
        $this->_invoiceManager = new InvoiceManager; 
        // getInvoices() c'est la méthode extand dans le datasManager
        $invoices = $this->_invoiceManager->getFiveInvoices();

        //* ==========| Societies |==========
        $this->_societyManager = new SocietyManager; 
        // getSocieties() c'est la méthode extand dans le datasManager
        $societies = $this->_societyManager->getFiveSocieties();

        //* ==========| Form |==========
        $this->_formManager = new FormManager; 
        // getSocieties() c'est la méthode extand dans le datasManager
        $form = $this->_formManager->getForm();


     
        //* ==========| Home datas |==========
        $this->_view = new View('Home');
        $this->_view->generate(array(
            'invoices'  => $invoices,
            'contacts'  => $contacts,
            'societies' => $societies,
            'form'      => $form
        ));
    }
}

