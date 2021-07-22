<!-- HEAD -->
<?php require_once 'conexion.php'; ?>
<?php require_once 'includes/helpers.php'; ?>
<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bl🪐g de peliculas</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Codystar:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
</head>
<body>

<header id="cabecera">
    <div id="logo">
        <a href="index.php">
            Bl🪐g de peliculas
        </a><span style="color:white; background-color:black; font-family: 'Space Mono', monospace; font-weight:normal; font-style:italic;">Tu espacio, tus peliculas.</span>
    </div>
    <!-- MENU  -->

    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    foreach($categorias as $categoria): 
            ?>
            <li>
                <a href="categoria.php?id=<?=$categoria['id']?>"><?=$categoria['nombre']?></a>
            </li>
            <?php 
                    endforeach; 
                endif;
            ?>
            <li>
                <a href="index.php">Sombre mi</a>
            </li>
            <li>
                <a href="index.php">Contacto</a>
            </li>
        </ul>      
    </nav>

    <div class="clearfix"></div>
</header>

<div id="contenedor">   