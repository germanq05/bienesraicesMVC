<?php 

    //Evitar arrancar dos veces una sesion
    if(!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION['login'] ?? null;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes raices</title>
    <link rel="stylesheet" href="build/css/app.css">
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio': ''; ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                    <img src="build/img/logo.svg" alt="imagen logo">
                </a>
                <div class="mobile-menu">
                    <img src="build/img/barras.svg" alt="Icono Menu Resposive">
                </div>

                <div class="derecha">
                    <img src="build/img/dark-mode.svg" alt="Boton Dark" class="dark-mode-boton">

                    <nav class="navegacion">
                        <a href="nosotros.php">Nosotros</a>
                        <a href="anuncios.php">Anuncios</a>
                        <a href="blog.php">Blog</a>
                        <a href="contacto.php">Contacto</a>

                        <?php if($auth): ?>
                            <a href="/cerrar-sesion.php">Cerrar Sesion</a>
                        <?php endif; ?>

                    </nav>
                </div>
            </div>
            <!--Cierre de la barra-->

            <?php echo $inicio ? "<h1>Venta de Casas y Departamentos</h1>" : '';?>

        </div>
    </header>