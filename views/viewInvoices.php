<?php
//* ==========| Titre de la page |==========
$this->_titlePage = 'Invoices';

//* ==========| Content |==========
    //* ==========| Invoices |==========
    $datasInvoices = '';
    foreach($invoices as $invoice ){
        $datasInvoices .= 
            '<tr data-href="DetailInvoive?'.$invoice->id().'">
                <td class="column1">'.$invoice->numbers()    .'</td>
                <td class="column2">'.$invoice->dates()      .'</td>
                <td class="column3">'.$invoice->societyName().'</td> 
                <td class="column4">'.$invoice->type()       .'</td>
            </tr>'
        ;   
    }
?>

<h2>COGIP: Invoice directory</h2>


<!--! ====================| Section Tables |==================== -->
<section class="containerTables">
    <!--* ====================| table des factures |==================== -->
    <div class='tableContainer'>
        <table class="tableInvoices">
            <thead>
                <tr class="tableHead">
                    <th class="column1">Invoices number</th>
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
</section>