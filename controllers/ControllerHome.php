<?php
require_once('views/View.php');

class ControllerHome {

    private $_contactManager; // nouvelle instance pour accéder  aux fonctions
    private $_invoiceManager;
    private $_societyManager;
    
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

     
        //* ==========| Home datas |==========
        $this->_view = new View('Home');
        $this->_view->generate(array(
            'invoices'  => $invoices,
            'contacts'  => $contacts,
            'societies' => $societies
        ));
    












































        //* =============== | Setup Variable| ===============
        $firstNameErr = $lastNameErr = $typeErrInvoice = $typeErrCompany = $emailErr = $nameErr = $datesErr = $numbersErr = $phoneErr = $vatErr = $countryErr = $societyErr = $successInvoiceForm = $successSocietyForm = $successContactForm = $firstName = $lastName = $type = $email = $name = $dates = $numbers = $phone = $vat = $country = $society = ''; 
        $ok = 0;

        $msgError = array('First Name is required.', 'Last Name is required.', 'Type is required.', 'Email is required.', 'Name is required.', 'Date is required.', 'Numbers is required.', 'Phone is required.', 'VAT is required.', 'Country is required.', 'Society is required.');
        //?===============================================================================================================================================================


        // * ========================== | Functions | ==========================
        function setErrorFor($input, $indexMsgErr){
        global $msgError;
        return '<small class="errorInputMsg">'.$msgError[$indexMsgErr].'</small>';
        }

        function testInput($input){
        global $ok;
        $msgError = '<small class="errorInputMsg">Only letters are allowed.</small>';
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);

        return !filter_var($input, FILTER_SANITIZE_STRING) ? $msgError : 'ok';
        }

        function testMail($input){
        $msgErrorTag = '<small class="errorInputMsg">Please enter a valid email.</small>';
        return !filter_var($input, FILTER_VALIDATE_EMAIL) ? $msgErrorTag : 'ok';
        }

        function testDate($input){
        $msgErrorTag = '<small class="errorInputMsg">Please enter a valid date.</small>';
        $date = date_parse($input);
        return !checkdate($date) ? $msgErrorTag : 'ok';
        }
        //?===============================================================================================================================================================


        //* =============== | Test form Invoice | ===============
        if(isset($_POST['submitInvoice']) && $_POST['submitInvoice'] != '') {

            $nameInvoice    = $_POST['society'];
            $InvoiceNumbers = $_POST['numbers'];
            $date           = $_POST['dates'];
            $type           = $_POST['type'];

            if(empty($nameInvoice)){
                $nameErrInvoice = setErrorFor('society', 4);
            } elseif(testInput($nameInvoice) == 'ok'){
                $ok +=1;
            }else{
                $nameErrInvoice = testInput($nameInvoice);
            }

            if(empty($InvoiceNumbers)){
                $numbersErr = setErrorFor('numbers', 6);
            } elseif(testInput($InvoiceNumbers) == 'ok'){
                $ok +=1;
            }else{
                $numbersErr = testInput($InvoiceNumbers);
            }

            if(empty($date)){
                $datesErr = setErrorFor('dates', 5);
            } elseif(testInput($date) == 'ok'){
                $ok +=1;
            }else{
                $datesErr = testInput($date);
            }

            if(empty($type)){
                $typeErrInvoice = setErrorFor('type', 2);
            } else{
                $ok +=1;
            }

            if( $ok == 4){
                $data = [
                    'society' => $_POST['society'],
                    'numbers' => $_POST['numbers'],
                    'dates'   => $_POST['dates'],
                    'type'    => $_POST['type'],
                ];
                $insertion = 'INSERT INTO invoices (society, numbers, dates, type) VALUES (:society,:numbers,:dates,:type)';
                $db -> prepare($insertion) -> execute($data);

                return $successInvoiceForm = '<p class="successMessage">les données ont bien été enregistrées!</p>';
            }else{ 
                return $successInvoiceForm = '<p class="failedMessage">les données n\'ont pas été enregistrées !</p>';
            }
        }
        //?===============================================================================================================================================================


        //* =============== | Test form Company | ===============
        if(isset($_POST['submitCompany']) && $_POST['submitCompany'] != '') {
            
            $nameCompany = $_POST['name'];
            $vat         = $_POST['vat'];
            $country     = $_POST['country'];
            $type        = $_POST['type']   ;
            
            if(empty($nameCompany)){
                $nameErrCompany = setErrorFor('name', 4);
            } elseif(testInput($nameCompany) == 'ok'){
                $ok +=1;
            }else{
                $nameErrCompany = testInput($nameCompany);
            }
            
            if(empty($vat)){
                $vatErr = setErrorFor('vat', 8);
            } elseif(testInput($vat) == 'ok'){
                $ok +=1;
            }else{
                $vatErr = testInput($vat);
            }

            if(empty($country)){
                $countryErr = setErrorFor('country', 9);
            } elseif(testInput($vat) == 'ok'){
                $ok +=1;
            }else{
                $countryErr = testInput($country);
            }

            if(empty($type)){
                $typeErrCompany = setErrorFor('type', 2);
            } else{
                $ok +=1;
            }

            if( $ok == 4){
                $data = [
                'name'    => $_POST['name'],
                'vat'     => $_POST['vat'],
                'country' => $_POST['country'],
                'type'    => $_POST['type']
                ];
                $insertion = 'INSERT INTO societies (name, vat, country, type) VALUES (:name,:vat,:country,:type)';
                $db -> prepare($insertion) -> execute($data);

                return $successSocietyForm = '<p class="successMessage">les données ont bien été enregistrées !</p>';
            }else{ 
                return $successSocietyForm = '<p class="failedMessage">les données n\'ont pas été enregistrées !</p>';
            }
        }
        //?===============================================================================================================================================================


        //* =============== | Test form Contact | ===============
        if(isset($_POST['submitContact']) && $_POST['submitContact'] != '') {

            $lastName  = $_POST['lastName'];
            $firstName = $_POST['firstName'];
            $phone     = $_POST['phone'];
            $email     = $_POST['email'];
            $society   = $_POST['society'];

            if(empty($lastName)){
                $lastNameErr = setErrorFor('lastName', 1);
            } elseif(testInput($lastName) == 'ok'){
                $ok +=1;
            }else{
                $lastNameErr = testInput($lastName);
            }

            if(empty($firstName)){
                $firstNameErr = setErrorFor('firstName', 0);
            } elseif(testInput($firstName) == 'ok'){
                $ok +=1;
            }else{
                $firstNameErr = testInput($firstName);
            }

            if(empty($phone)){
                $phoneErr = setErrorFor('phone', 7);
            } elseif(testInput($phone) == 'ok'){
                $ok +=1;
            }else{
                $phonesErr = testInput($phone);
            }

            if(empty($email)){
                $emailErr = setErrorFor('email', 3);
            } elseif( testMail($email) == 'ok'){
                $ok +=1;
            }else{
                $emailErr = testMail($email);
            }

            if(empty($society)){
                $societyErr = setErrorFor('society', 10);
            } elseif( testInput($society) == 'ok'){
                $ok +=1;
            }else{
                $societyErr = testInput($society);
            }
        

            if( $ok == 5){
                $data = [
                    'lastName'  => $_POST['lastName'],
                    'firstName' => $_POST['firstName'],
                    'phone'     => $_POST['phone'],
                    'email'     => $_POST['email'],
                    'society'   => $_POST['society']
                ];
                $insertion = 'INSERT INTO contacts (lastName, firstName, phone, email,society) VALUES (:lastName, :firstName, :phone, :email,:society)';
                $db -> prepare($insertion) -> execute($data);

                return $successContactForm = '<p class="successMessage">les données ont bien été enregistrées!</p>';
            }else{ 
                return $successContactForm = '<p class="failedMessage">les données n\'ont pas été enregistrées !</p>';
            }
        }
        //?===============================================================================================================================================================

    }
}

