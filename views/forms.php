
<!-- //* ====================| Section Formulaire |==================== -->
<section class="formContainer">
    <!-- //! ====================| Form des factures |==================== -->
    <form class="invoiceForm" action="Home" method="post">
        <h3>Add a new invoice</h3>
        <input name='society'    type="text" placeholder="Company name">
        <?= isset($nameErrInvoice) ? $nameErrInvoice : null; ?>
        <input name='numbers' type="text" placeholder="Invoice numbers">
        <?= isset($numbersErr)     ? $numbersErr : null; ?>
        <input name='dates'   type="date" placeholder="Date">
        <?= isset($datesErr)       ? $datesErr : null; ?>
        <select name="type">
            <option value=""  selected>Type</option>
            <option value="client"    >Client</option>
            <option value="provider"  >Provider</option>
        </select>
        <?= isset($typeErrInvoice) ? $typeErrInvoice : null; ?>
        <input name='submitInvoice' type="submit" value="ADD">
    </form>
    <!-- <?= $successInvoiceForm; ?> -->



    <!-- //! ====================| Form des sociétés |==================== -->
    <form class="societyForm" action="Home" method="post">
        <h3>Add a new company</h3>
        <input name='name'    type="text" placeholder="Company name">
        <?= isset($nameErrCompany) ? $nameErrCompany : null; ?>
        <input name='vat'     type="text" placeholder="VAT numbers">
        <?= isset($vatErr)         ? $vatErr : null; ?>
        <input name='country' type="text" placeholder="Country">
        <?= isset($countryErr)     ? $countryErr : null; ?>
        <select name="type">
            <option value="" selected>Type</option>
            <option value="client"    >Client</option>
            <option value="provider"  >Provider</option>
        </select>
        <?= isset($typeErrCompany) ? $typeErrCompany : null; ?>
        
        <input name='submitCompany'  type="submit" value="ADD">
    </form>
    <!-- <?= $successSocietyForm; ?> -->



    <!-- //! ====================| Form des contacts |==================== -->
    <form class="contactForm" action="Home" method="post">
        <h3>Add a new contact</h3>
        <input name='lastName'  type="text"  placeholder="Last name">
        <?= isset($lastNameErr)  ? $lastNameErr : null; ?>
        <input name='firstName' type="text"  placeholder="First name">
        <?= isset($firstNameErr) ? $firstNameErr : null; ?>
        <input name='phone'     type="text"  placeholder="Phone number">
        <?= isset($phoneErr)     ? $phoneErr : null; ?>
        <input name='email'     type="email" placeholder="Address mail"> 
        <?= isset($emailErr)     ? $emailErr : null; ?>
        <input name='society'   type="text" placeholder="Company name"> 
        <?= isset($societyErr)   ? $societyErr : null; ?>
        <input name='submitContact' type="submit" value="ADD">
    </form>
    <!-- <?= $successContactForm; ?> -->
</section>