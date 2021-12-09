<?php
abstract class Model{

    private static $_bdd;
    
    // private $db_host = 'localhost';
    // private $db_name = 'cogip';
    // private $db_user = 'root';
    // private $db_pass = '';
    
    //* ==========| Instancie la connexion à la DB |==========
    private static function setBdd(){
        // self::$_bdd = new PDO('mysql:host='.$db_host.';dbname='.$db_name.';charset=utf8',$db_user, $db_pass );
        
        self::$_bdd = new PDO('mysql:host=localhost;dbname=cogip;charset=UTF8','root','');
        self::$_bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        // self::$_bdd -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    }

    //* ==========| Récupére la connexion à la DB |==========
    protected function getBdd(){
        //on fait une vérification si c'est null alors on met à jour la bdd avec la méthode setBdd
        if(self::$_bdd == null)$this->setBdd();
        return self::$_bdd;
    }

    //* ==========| Récupére toutes les datas de la Bdd |==========
    // 1er méthode pour récuper toutes les données d'une table
    protected function getAll($tableName, $objectName){

        $dataTable = [];
        $req = self::getBdd()->prepare('SELECT * FROM '.$tableName.' ORDER BY id DESC');
        $req->execute();
        while( $data = $req->fetch(PDO::FETCH_ASSOC)){
            $dataTable[] = new $objectName($data);
        }
        return $dataTable;
        $req->closeCursor();
    }

    //* ==========| Récupére les 5 dernière datas de la Bdd |==========
    protected function getFive($tableName, $objectName){

        $dataTable = [];
        $req = self::getBdd()->prepare('SELECT * FROM '.$tableName.' ORDER BY id DESC LIMIT 0,5');
        $req->execute();
        while( $data = $req->fetch(PDO::FETCH_ASSOC)){
            $dataTable[] = new $objectName($data);
        }
        return $dataTable;
        $req->closeCursor();
    }

    //* ==========| Récupére l'ID de l'élément selected |==========
    protected function getID(){
        $url = explode('?',$_SERVER['REQUEST_URI']);
        $lastParam = end($url);

        if (preg_match('~[0-9]+~',$lastParam, $matches)) {
                $id = $matches[0];
        }
        return $id;
    }

    //* ==========| Récupére les datas du contact selectioné |==========
    
    protected function getDataDetailContact($tableName, $objectName, $id){
        $dataTable = [];
        $req = self::getBdd()->prepare('
            SELECT * FROM '.$tableName.' 
            LEFT JOIN invoices ON contacts.societyName = invoices.societyName 
            WHERE contacts.id = '.$id
        );
        $req->execute();
        while( $data = $req->fetch(PDO::FETCH_ASSOC)){
            $dataTable[] = new $objectName($data);
        }
        return $dataTable;
        $req->closeCursor();
    }

    //* ==========| Récupére les datas de la société selectionée |==========
    
    protected function getDataDetailSociety($tableName, $objectName, $id){
        $dataTable = [];
        $req = self::getBdd()->prepare('
            SELECT * FROM '.$tableName.'
            LEFT JOIN invoices ON societies.name = invoices.societyName
            LEFT JOIN contacts ON societies.name = contacts.societyName
            WHERE societies.id =  '.$id
        );
        $req->execute();
        while( $data = $req->fetch(PDO::FETCH_ASSOC)){
            $dataTable[] = new $objectName($data);
        }
        return $dataTable;
        $req->closeCursor();
    }

    
    //* ==========| Récupére les datas de la facture selectionée |==========
    
    protected function getDataDetailInvoice($tableName, $objectName, $id){
        $dataTable = [];
        $req = self::getBdd()->prepare('
            SELECT * FROM '.$tableName.'
            LEFT JOIN societies ON invoices.societyName = societies.name
            LEFT JOIN contacts  ON invoices.societyName = contacts.societyName
            WHERE invoices.id = '.$id
        );
        $req->execute();
        while( $data = $req->fetch(PDO::FETCH_ASSOC)){
            $dataTable[] = new $objectName($data);
        }
        return $dataTable;
        $req->closeCursor();
    }

}

