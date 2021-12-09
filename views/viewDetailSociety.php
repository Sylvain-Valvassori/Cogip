<?php
//* ==========| Titre de la page |==========
$this->_titlePage = 'Detail\'s society';


//* ====================| table des contacts |==================== 
foreach($detailSociety as $detail){
    $societyDetailContact .=
        '<tr>
            <td class="column1">'.$detail->lastName().' '.$detail->firstName().'</td>
            <td class="column2">'.$detail->phone().'</td>
            <td class="column3">'.$detail->email().'</td>
        </tr>'
    ;

    //* ====================| table des factures |==================== 
    $societyDetailInvoice .=
        '<tr>
            <td class="column1">'.$detail->numbers()    .'</td>
            <td class="column2">'.$detail->dates()      .'</td>
            <td class="column3">'.$detail->societyName().'</td>
        </tr>'
    ;
}
?>

<!--! ====================| Content |==================== -->
<h2>Society : <?= $detail->lastName().' '.$detail->firstName(); ?></h2>

<section class="containerTables">

    <div class='tableContainer'>        
        <!--* ====================| Infos de la société |====================  -->
        <p>VAT&ensp;&ensp;: &ensp;<span><?= $detail->vat();  ?></span></p>
        <p>Type&ensp;:      &ensp;<span><?= $detail->type(); ?></span></p>

        <!--* ====================| table des contacts |==================== -->
        <h3>The contact persons</h3>
        <table class="tableContact">
            <thead>
                <tr class="tableHead">
                    <th class="column1">Name</th>
                    <th class="column2">Phone</th>
                    <th class="column3">Email</th>
                </tr>
            </thead>
            <tbody>
                <?= $societyDetailContact; ?>
            </tbody>
        </table>

        <!--* ====================| table des factures |==================== -->
        <h3>The society's invoices</h3>
        <table class="tableInvoice">
            <thead>
                <tr class="tableHead">
                    <th class="column1">N° Invoice</th>
                    <th class="column2">Date</th>
                    <th class="column3">Contact name</th>
                </tr>
            </thead>
            <tbody>
                <?= $societyDetailInvoice; ?>
            </tbody>
        </table>
    </div>
</section>