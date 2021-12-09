<?php
//* ==========| Titre de la page |==========
$this->_titlePage = 'Home';

//* ==========| Content |==========
    //* ==========| Contacts |==========
    $datasContacts = '';
    foreach($contacts as $contact ){
        $datasContacts .= 
            '<tr data-href="DetailContact?'.$contact->id().'">
                <td class="column1">'.$contact->lastName().' '.$contact->firstName().'</td>
                <td class="column2">'.$contact->phone()      .'</td>
                <td class="column3">'.$contact->email()      .'</td>
                <td class="column4">'.$contact->societyName().'</td> 
            </tr>'
        ;   
    }

    //* ==========| Invoices |==========
    $datasInvoices = '';
    foreach($invoices as $invoice ){
        $datasInvoices .= 
            '<tr data-href="DetailInvoice?'.$invoice->id().'">
                <td class="column1">'.$invoice->numbers()    .'</td>
                <td class="column2">'.$invoice->dates()      .'</td>
                <td class="column3">'.$invoice->societyName().'</td> 
                <td class="column4">'.$invoice->type()       .'</td>
            </tr>'
        ;   
    }

    //* ==========| Societies |==========
    $datasSocieties = '';
    foreach($societies as $society ){
        $datasSocieties .= 
            '<tr data-href="DetailSociety?'.$society->id().'">
                <td class="column1">'.$society->name()   .'</td>
                <td class="column2">'.$society->vat()    .'</td>
                <td class="column3">'.$society->country().'</td>
                <td class="column4">'.$society->type()   .'</td> 
            </tr>'
        ;   
    }
?>

        
<h2>Welcome to the COGIP</h2>

<?php require_once('forms.php')?>
 <!--! ====================| Section Tables |==================== -->
 <section class="tablesContainer">
        <!--* ====================| table des factures |==================== -->
        <div class='tableContainer recentInvoices'>
            <h3>Recent Invoices</h3>
            <table class="tableInvoices">
                    <thead>
                        <tr class="tableHead">
                            <th class="column1">Invoice number</th>
                            <th class="column2">Dates</th>
                            <th class="column3">Contact</th>
                            <th class="column4">Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $datasInvoices; ?>
                    </tbody>
            </table>
        </div>

        <!--* ====================| table des contacts |==================== -->
        <div class='tableContainer recentContacts'>
                <h3>Recent Contacts</h3>
                <table class="tableContacts">
                    <thead>
                        <tr class="tableHead">
                            <th class="column1">Name</th>
                            <th class="column2">Phone</th>
                            <th class="column3">Email</th>
                            <th class="column4">Society</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?= $datasContacts; ?>
                    </tbody>
                </table>
        </div>

        <!--* ====================| table des sociétés |==================== -->
        <div class='tableContainer recentSocieties'>
        <h3>Recent Societies</h3>
            <table class="tableSocieties">
                <thead>
                    <tr class="tableHead">
                        <th class="column1">Name</th>
                        <th class="column2">VAT</th>
                        <th class="column3">Country</th>
                        <th class="column4">Type</th>
                    </tr>
                </thead>
                <tbody>
                    <?= $datasSocieties; ?>
                </tbody>
            </table>
        </div>
    </section>
</body>     
</html>