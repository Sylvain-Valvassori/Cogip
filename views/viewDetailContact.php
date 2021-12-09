<?php
//* ==========| Titre de la page |==========
$this->_titlePage = 'Detail\'s contact';

//* ==========| Content |==========
    $contactInvoice = '';
    foreach($detailContact as $detail){
        $contactInvoice .=
            '<tr>
                <td class="column1">'.$detail->Numbers()    .'</td>
                <td class="column2">'.$detail->dates()      .'</td>
                <td class="column3">'.$detail->societyName().'</td>
            </tr>'
        ;
    }
?>
<!--! ====================| Content |==================== -->
<h2>Contact : <?= $detail->lastName().' '.$detail->firstName(); ?></h2>

<section class="containerTables">
    <div class='tableContainer'>
    
        <!--* ====================| Infos du contact |====================  -->
        <p>Contact&ensp;:     &ensp;<span><?= $detail->lastName().' '.$detail->firstName(); ?></span></p>
        <p>Society&ensp; :    &ensp;<span><?= $detail->societyName(); ?></span></p>
        <p>Email&emsp;&ensp;: &ensp;<span><?= $detail->email();       ?></span></p>
        <p>Phone&ensp;&ensp;: &ensp;<span><?= $detail->phone();       ?></span></p>
        
        <!--* ====================| table des factures |==================== -->
        <h3>The contact's invoices</h3>
        <table class="tableInvoice">
            <thead>
                <tr class="tableHead">
                    <th class="column1">N° Invoice</th>
                    <th class="column2">Date</th>
                    <th class="column3">Society</th>
                </tr>
            </thead>
            <tbody>
                <?= $contactInvoice; ?>
            </tbody>
        </table>
    </div>
</section>