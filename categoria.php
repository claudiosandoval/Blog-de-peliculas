<?php require_once 'includes/header.php'; ?> <!-- helpers se inicializa en header por lo que lo posicionamos encima del todo para poder utilizar las funciones correspondientes -->
<?php
    $categoriaEspecifica = conseguirCategoria($db, $_GET['id']);
    if(!isset($categoriaEspecifica['id'])) {
        header("Location: index.php");
    }
    ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">   
    <div class="cuadro">
        <h1><?=$categoriaEspecifica['nombre']?></h1>
    </div>

    <?php
        $peliculas = conseguirPeliculas($db, false, $_GET['id']);
        //var_dump($peliculas);
        if(!empty($peliculas) && mysqli_num_rows($peliculas) >= 1):
            while($pelicula = mysqli_fetch_assoc($peliculas)):
    ?>

    <article class="pelicula">
        <br>
        <a href="entrada.php?id=<?=$pelicula['id']?>">
        <img src="uploads/images/<?=$pelicula['imagen']?>" alt="imagen pelicula" width="184" height="273">
            <h2><?= $pelicula['titulo'] ?></h2>
            <span class="fecha"><?= $pelicula['categoria'].' | '.$pelicula['fecha'] ?></span>
        </a>
        <p><?= substr($pelicula['descripcion'], 0, 100)."..."  ?></p>
    </article>

    <?php 
            endwhile;
        else:
    ?>
    <div class="alerta alerta_error">No hay peliculas con esta categoria</div>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>