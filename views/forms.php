
<!--! ====================| Section Formulaire |==================== -->
    <section class="formContainer">
        <!--* ====================| Form des factures |==================== -->
        <form class="invoiceForm" action="index.php" method="post">
            <h3>Add a new invoice</h3>
            <input name='society'    type="text" placeholder="Company name">
            <?php echo isset($nameErrInvoice) ? $nameErrInvoice : null; ?>
            <input name='numbers' type="text" placeholder="Invoice numbers">
            <?php echo isset($numbersErr) ? $numbersErr : null; ?>
            <input name='dates'   type="date" placeholder="Date">
            <?php echo isset($datesErr) ? $datesErr : null; ?>
            <select name="type">
                <option value=""  selected>Type</option>
                <option value="client"    >Client</option>
                <option value="provider"  >Provider</option>
            </select>
            <?php echo isset($typeErrInvoice) ? $typeErrInvoice : null; ?>
            <input name='submitInvoice' type="submit" value="ADD">
        </form>
        <?php echo $successInvoiceForm; ?>
        <!--* ====================| Form des sociétés |==================== -->
        <form class="societyForm" action="index.php" method="post">
            <h3>Add a new company</h3>
            <input name='name'    type="text" placeholder="Company name">
            <?php echo isset($nameErrCompany) ? $nameErrCompany : null; ?>

            <input name='vat'     type="text" placeholder="VAT numbers">
            <?php echo isset($vatErr) ? $vatErr : null; ?>

            <input name='country' type="text" placeholder="Country">
            <?php echo isset($countryErr) ? $countryErr : null; ?>

            <select name="type">
                <option value="" selected>Type</option>
                <option value="client"    >Client</option>
                <option value="provider"  >Provider</option>
            </select>
            <?php echo isset($typeErrCompany) ? $typeErrCompany : null; ?>
            
            <input name='submitCompany'  type="submit" value="ADD">
        </form>
        <?php echo $successSocietyForm; ?>
        <!--* ====================| Form des contacts |==================== -->
        <form class="contactForm" action="index.php" method="post">
            <h3>Add a new contact</h3>
            <input name='lastName'  type="text"  placeholder="Last name">
            <?php echo isset($lastNameErr) ? $lastNameErr : null; ?>
            <input name='firstName' type="text"  placeholder="First name">
            <?php echo isset($firstNameErr) ? $firstNameErr : null; ?>
            <input name='phone'     type="text"  placeholder="Phone number">
            <?php echo isset($phoneErr) ? $phoneErr : null; ?>
            <input name='email'     type="email" placeholder="Address mail"> 
            <?php echo isset($emailErr) ? $emailErr : null; ?>
            <input name='society'   type="text" placeholder="Company name"> 
            <?php echo isset($societyErr) ? $societyErr : null; ?>
            <input name='submitContact' type="submit" value="ADD">
        </form>
        <?php echo $successContactForm; ?>
    </section>