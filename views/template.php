<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author"   content="sylvain valvassori">

    <link rel="stylesheet" href="./assets/css/style.css">
    <script src="./assets\js\clickRow.js"></script>

    <title><?= $titlePage; ?></title>

</head>
<body>
<!--! ====================| Header |==================== -->
<!-- navigation nav -->
<header>
    <nav>
        <ul>
            <li>
                <a href="Home">Home</a>
            </li>
            <li>
                <a href="Contacts">Contacts</a>
            </li>
            <li>
                <a href="Societies">Societies</a>
            </li>
            <li>
                <a href="Invoices">Invoices</a>
            </li>
            <li>
                <a href="Login">Connexion</a>
            </li>
        </ul>
    </nav>
</header>
<!--! ====================| Content |==================== -->

<?= $content; ?>

<!-- <footer class="footer">
    <p>Create by Valvassori Sylvain</p>
</footer> -->
</body>
</html>
