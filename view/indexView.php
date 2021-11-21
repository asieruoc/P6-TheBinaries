<?php

$header  = "view/templates/header.php";
require($header);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="./view/css/style_view.css" rel="stylesheet"/>
    <title>The Binaries</title>
</head>

<body>
        <header>
        <div>
        <div class="left">
                <h1><span><img src="./assets/Logo_TheBinaries.jpg" alt="TheBinaries logo"></span></h1>
                </div>
                <div class="center">
                <h1>Centro de Estudios The Binaries</h1>
                </div>
                <div class="right">
                <h1><a  href="view/login.php">Iniciar sesión / Registrar</a><h1>
            </div>
            <div style="clear: both"></div>
            </div>
        </header>
        <main>
            <h2> <strong> APLICACIÓN DE HORARIOS</strong></h2>

        </main>
</body>
</html>

<?php
$footer  = "templates/footer.php";
require($footer);
?>
