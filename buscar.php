<?php require_once 'includes/header.php'; ?> <!-- helpers se inicializa en header por lo que lo posicionamos encima del todo para poder utilizar las funciones correspondientes -->
<?php
    if(!isset($_POST['busqueda'])) {
        header("Location: index.php");
    }
    
    ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">   
    <div class="cuadro">
        <h1>Busqueda de: <?=$_POST['busqueda']?></h1>
    </div>

    <?php
        //var_dump($peliculas);
        $buscarPelicula = conseguirPeliculas($db, null, null, $_POST['busqueda']);
        //var_dump($buscarPelicula);
        //die();  
        if(!empty($buscarPelicula) && mysqli_num_rows($buscarPelicula) >= 1):
            while($buscarPeliculas = mysqli_fetch_assoc($buscarPelicula)):
    ?>

    <article class="pelicula">
        <a href="entrada.php?id=<?=$buscarPeliculas['id']?>">
            <br>
            <img src="uploads/images/<?=$buscarPeliculas['imagen']?>" alt="imagen pelicula" width="184" height="273">
            <h2><?= $buscarPeliculas['titulo'] ?></h2>
            <span class="fecha"><?= $buscarPeliculas['categoria'].' | '.$buscarPeliculas['fecha'] ?></span>
        </a>
        <p><?= substr($buscarPeliculas['descripcion'], 0, 100)."..."  ?></p>
    </article>

    <?php 
            endwhile;
        else:
    ?>
    <div class="alerta alerta_error">No hay peliculas con este nombre</div>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>