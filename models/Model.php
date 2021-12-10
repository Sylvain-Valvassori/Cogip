<?php
abstract class Model{

    private static $_bdd;
    
    const db_name = 'cogip';
    const db_user = 'root';
    const db_pass = '';
    const db_host = 'localhost';
    
    //* ==========| Instancie la connexion à la DB |==========
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host='.self::db_host.';dbname='.self::db_name.';charset=UTF8',self::db_user,self::db_pass);
        self::$_bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        self::$_bdd -> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
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



    //! ==================================================| Formulaire |==================================================
    //! ==================================================================================================================
    
    //* =============== | Setup Variable| ===============
    private $firstNameErr , $lastNameErr , $typeErrInvoice , $typeErrCompany , $emailErr , $nameErr , $datesErr , $numbersErr , $phoneErr , $vatErr , $countryErr , $societyErr , $successInvoiceForm , $successSocietyForm , $successContactForm , $firstName , $lastName , $type , $email , $name , $dates , $numbers , $phone , $vat , $country , $society , $ok;

    private $msgError = array('First Name is required.', 'Last Name is required.', 'Type is required.', 'Email is required.', 'Name is required.', 'Date is required.', 'Numbers is required.', 'Phone is required.', 'VAT is required.', 'Country is required.', 'Society is required.');
    //?===============================================================================================================================================================


    // * ========================== | Functions | ==========================
    private function setErrorFor($input, $indexMsgErr){
    return '<small class="errorInputMsg">'.$this->msgError[$indexMsgErr].'</small>';
    }

    private function testInput($input){
    $msgError = '<small class="errorInputMsg">Only letters are allowed.</small>';
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return !filter_var($input, FILTER_SANITIZE_STRING) ? $msgError : 'ok';
    }

    private function testMail($input){
    $msgErrorTag = '<small class="errorInputMsg">Please enter a valid email.</small>';
    return !filter_var($input, FILTER_VALIDATE_EMAIL) ? $msgErrorTag : 'ok';
    }

    private function testDate($input){
    $msgErrorTag = '<small class="errorInputMsg">Please enter a valid date.</small>';
    $date = date_parse($input);
    return !checkdate($date) ? $msgErrorTag : 'ok';
    }
    //?===============================================================================================================================================================

    protected function FormInvoice(){
        //* =============== | Test form Invoice | ===============
        if(isset($_POST['submitInvoice']) && $_POST['submitInvoice'] != '') {

            $nameInvoice    = $_POST['society'];
            $InvoiceNumbers = $_POST['numbers'];
            $date           = $_POST['dates'];
            $type           = $_POST['type'];

            if(empty($nameInvoice)){
                $nameErrInvoice = $this->setErrorFor('societyName', 4);
            } elseif($this->testInput($nameInvoice) == 'ok'){
                $this->ok +=1;
            }else{
                $nameErrInvoice = $this->testInput($nameInvoice);
            }

            if(empty($InvoiceNumbers)){
                $numbersErr = $this->setErrorFor('numbers', 6);
            } elseif($this->testInput($InvoiceNumbers) == 'ok'){
                $this->ok +=1;
            }else{
                $numbersErr = $this->testInput($InvoiceNumbers);
            }

            if(empty($date)){
                $datesErr = $this->setErrorFor('dates', 5);
            } elseif($this->testInput($date) == 'ok'){
                $this->ok +=1;
            }else{
                $datesErr = $this->testInput($date);
            }

            if(empty($type)){
                $typeErrInvoice = $this->setErrorFor('type', 2);
            } else{
                $this->ok +=1;
            }

            if( $this->ok == 4){
                $data = [
                    'societyName' => $_POST['society'],
                    'numbers'     => $_POST['numbers'],
                    'dates'       => $_POST['dates'],
                    'type'        => $_POST['type']
                ];
                $insertion = 'INSERT INTO invoices (societyName, numbers, dates, type, society_id) VALUES (:societyName,:numbers,:dates,:type,10)';
                self::getBdd() -> prepare($insertion) -> execute($data);

                
                return $successInvoiceForm = '<p class="successMessage">les données ont bien été enregistrées !</p>';
            }else{ 
                return $successInvoiceForm = '<p class="failedMessage">les données n\'ont pas été enregistrées !</p>';
            }
        }
    }
    //?===============================================================================================================================================================

    protected function FormSociety(){
        //* =============== | Test form Company | ===============
        if(isset($_POST['submitCompany']) && $_POST['submitCompany'] != '') {
            
            $nameCompany = $_POST['name'];
            $vat         = $_POST['vat'];
            $country     = $_POST['country'];
            $type        = $_POST['type']   ;
            
            if(empty($nameCompany)){
                $nameErrCompany = $this->setErrorFor('name', 4);
            } elseif($this->testInput($nameCompany) == 'ok'){
                $this->ok +=1;
            }else{
                $nameErrCompany = $this->testInput($nameCompany);
            }
            
            if(empty($vat)){
                $vatErr = $this->setErrorFor('vat', 8);
            } elseif($this->testInput($vat) == 'ok'){
                $this->ok +=1;
            }else{
                $vatErr = $this->testInput($vat);
            }

            if(empty($country)){
                $countryErr = $this->setErrorFor('country', 9);
            } elseif($this->testInput($vat) == 'ok'){
                $this->ok +=1;
            }else{
                $countryErr = $this->testInput($country);
            }

            if(empty($type)){
                $typeErrCompany = $this->setErrorFor('type', 2);
            } else{
                $this->ok +=1;
            }

            if( $this->ok == 4){
                $data = [
                'name'    => $_POST['name'],
                'vat'     => $_POST['vat'],
                'country' => $_POST['country'],
                'type'    => $_POST['type']
                ];
                $insertion = 'INSERT INTO societies (name, vat, country, type) VALUES (:name,:vat,:country,:type)';
                self::getBdd() -> prepare($insertion) -> execute($data);

                return $successSocietyForm = '<p class="successMessage">les données ont bien été enregistrées !</p>';
            }else{ 
                return $successSocietyForm = '<p class="failedMessage">les données n\'ont pas été enregistrées !</p>';
            }
        }
    }
    //?===============================================================================================================================================================

    protected function FormContact(){
        //* =============== | Test form Contact | ===============
        if(isset($_POST['submitContact']) && $_POST['submitContact'] != '') {

            $lastName  = $_POST['lastName'];
            $firstName = $_POST['firstName'];
            $phone     = $_POST['phone'];
            $email     = $_POST['email'];
            $society   = $_POST['society'];

            if(empty($lastName)){
                $lastNameErr = $this->setErrorFor('lastName', 1);
            } elseif($this->testInput($lastName) == 'ok'){
                $this->ok +=1;
            }else{
                $lastNameErr = $this->testInput($lastName);
            }

            if(empty($firstName)){
                $firstNameErr = $this->setErrorFor('firstName', 0);
            } elseif($this->testInput($firstName) == 'ok'){
                $this->ok +=1;
            }else{
                $firstNameErr = $this->testInput($firstName);
            }

            if(empty($phone)){
                $phoneErr = $this->setErrorFor('phone', 7);
            } elseif($this->testInput($phone) == 'ok'){
                $this->ok +=1;
            }else{
                $phonesErr = $this->testInput($phone);
            }

            if(empty($email)){
                $emailErr = $this->setErrorFor('email', 3);
            } elseif( $this->testMail($email) == 'ok'){
                $this->ok +=1;
            }else{
                $emailErr = $this->testMail($email);
            }

            if(empty($society)){
                $societyErr = $this->setErrorFor('societyName', 10);
            } elseif( $this->testInput($society) == 'ok'){
                $this->ok +=1;
            }else{
                $societyErr = $this->testInput($society);
            }
        

            if( $this->ok == 5){
                $data = [
                    'lastName'    => $_POST['lastName'],
                    'firstName'   => $_POST['firstName'],
                    'phone'       => $_POST['phone'],
                    'email'       => $_POST['email'],
                    'societyName' => $_POST['society']
                ];
                $insertion = 'INSERT INTO contacts (lastName, firstName, phone, email,societyName) VALUES (:lastName, :firstName, :phone, :email,:societyName)';
                self::getBdd() -> prepare($insertion) -> execute($data);

                return $successContactForm = '<p class="successMessage">les données ont bien été enregistrées !</p>';
            }else{ 
                return $successContactForm = '<p class="failedMessage">les données n\'ont pas été enregistrées !</p>';
            }
        }
    }
    //?===============================================================================================================================================================
}

