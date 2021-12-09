<?php 

class DetailInvoiceManager extends Model{
    
    public function getDetailInvoice(){
        
        // on va chercher la méthode getDetail() pour lui indiquer le nom de la table et l'ID de la row où on veut récupérer les données
        //getDetail('nom de la table', 'nom de l'objet', l'id); 
        $this->getBdd();
        $id = $this->getID();
        return $this->getDataDetailInvoice('invoices','DetailInvoice',$id);
    }
}


