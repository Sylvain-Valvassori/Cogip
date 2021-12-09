<?php
//* ==========| Titre de la page |==========
$this->_titlePage = 'Societies';

//* ==========| Content |==========
    //* ==========| Societies Clients |==========
    $clientDirectory = '';
    foreach($societies as $society ){
        if($society->type() == 'client'){
            $clientDirectory .= 
                '<tr data-href="DetailSociety?'.$society->id().'">
                    <td class="column1">'.$society->name()   .'</td>
                    <td class="column2">'.$society->vat()    .'</td>
                    <td class="column3">'.$society->country().'</td>
                    <td class="column4">'.$society->type()   .'</td> 
                </tr>'
            ;   
    }}
    //* ==========| Societies Providers |==========
    $providerDirectory = '';
    foreach($societies as $society ){
        if($society->type() == 'provider'){
            $providerDirectory .= 
                '<tr data-href="DetailSociety?'.$society->id().'">
                    <td class="column1">'.$society->name()   .'</td>
                    <td class="column2">'.$society->vat()    .'</td>
                    <td class="column3">'.$society->country().'</td>
                    <td class="column4">'.$society->type()   .'</td> 
                </tr>'
            ;   
    }}
?>

<h2>COGIP: Society directory</h2>

<!--! ====================| Section Tables |==================== -->
<section class="containerTables">
    <!--* ====================| table des sociétés |==================== -->
    <div class='tableContainer'>
        <table class="tableSociety">
            <h3>Clients</h3>
            <thead>
                <tr class="tableHead">
                    <th class="column1">Name</th>
                    <th class="column2">VAT</th>
                    <th class="column3">Country</th>
                    <th class="column4">Type</th>
                </tr>
            </thead>
            <tbody>
                <?= $clientDirectory; ?>
            </tbody>
        </table>
    </div>

    <div class='tableContainer'>
        <table class="tableSociety">
            <h3>Providers</h3>
            <thead>
                <tr class="tableHead">
                    <th class="column1">Name</th>
                    <th class="column2">VAT</th>
                    <th class="column3">Country</th>
                    <th class="column4">Type</th>
                </tr>
            </thead>
            <tbody>
                <?= $providerDirectory; ?>
            </tbody>
        </table>
    </div>
</section>