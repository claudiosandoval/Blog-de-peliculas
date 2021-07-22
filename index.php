<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">   
    <div class="cuadro">
        <h1>ULTIMAS PELICULAS</h1>
    </div>

    <?php
        $peliculas = conseguirPeliculas($db, true);
        if(!empty($peliculas)):
            while($pelicula = mysqli_fetch_assoc($peliculas)):
    ?>

    <article class="pelicula">
        <a href="entrada.php?id=<?=$pelicula['id']?>">
            <br>
            <img src="images/<?=$pelicula['titulo']?>.jpg" alt="imagen pelicula" width="184" height="273">
            <h2><?= $pelicula['titulo'] ?></h2>
            <span class="fecha"><?= $pelicula['categoria'].' | '.$pelicula['fecha'] ?></span>
        </a>
        <p><?= substr($pelicula['descripcion'], 0, 100)."..."  ?></p>
    </article>

    <?php 
            endwhile;
        endif;
    ?>
    <div id="ver-todas">
        <a href="entradas.php">Ver todas las peliculas</a>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>