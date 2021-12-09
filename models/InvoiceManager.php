<?php 

class InvoiceManager extends Model{

    public function getInvoices(){
        // on va chercher la méthode getAll() pour récupérer toutes les données d'une table
        //getAll('nom de la table', 'nom de l'objet'); 
        $this->getBdd();
        return $this->getAll('invoices', 'Invoice');

    }

    public function getFiveInvoices(){
        // on va chercher la méthode getFive() pour récupérer les 5 données récentes de la table
        //getFive('nom de la table', 'nom de l'objet'); 
        $this->getBdd();
        return $this->getFive('invoices', 'Invoice');

    }
}