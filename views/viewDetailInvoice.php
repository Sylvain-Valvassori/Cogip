<?php
//* ==========| Titre de la page |==========
$this->_titlePage = 'Detail\'s invoice';

$invoiceDetailSociety = $invoiceDetailContact = '';
foreach($detailInvoice as $detail){

    //* ====================| table des societies |==================== 
    $invoiceDetailSociety .=
    '<tr>
        <td class="column1">'.$detail->name().'</td>
        <td class="column2">'.$detail->vat() .'</td>
        <td class="column3">'.$detail->type().'</td>
    </tr>'
    ;

    //* ====================| table des contacts |==================== 
    $invoiceDetailContact .=
    '<tr>
        <td class="column1">'.$detail->lastName().' '.$detail->firstName().'</td>
        <td class="column2">'.$detail->phone().'</td>
        <td class="column3">'.$detail->email().'</td>
    </tr>'
    ;

}

?>

<!--! ====================| Content |==================== -->
<h2>Invoice number: <?= $detail->numbers(); ?></h2>

<section class="containerTables">
    <div class='tableContainer'>

        <!--* ====================| table des sociétés |==================== -->
        <h3>The society linked to the invoice</h3>
        <table class="tableSociety">
            <thead>
                <tr class="tableHead">
                    <th class="column1">Name</th>
                    <th class="column2">VAT</th>
                    <th class="column3">Type's society</th>
                </tr>
            </thead>
            <tbody>
                <?= $invoiceDetailSociety; ?>
            </tbody>
        </table>

        <!--* ====================| table des contacts |==================== -->
        <h3>The society linked to the Contact</h3>
        <table class="tableContact">
            <thead>
                <tr class="tableHead">
                    <th class="column1">Name</th>
                    <th class="column2">Phone</th>
                    <th class="column3">Email</th>
                </tr>
            </thead>
            <tbody>
                <?= $invoiceDetailContact; ?>
            </tbody>
        </table>
    </div>
</section>