<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">   
    <div class="cuadro">
        <h1>ULTIMAS PELICULAS</h1>
    </div>

    <?php
        $peliculas = conseguirPeliculas($db);
        if(!empty($peliculas)):
            while($pelicula = mysqli_fetch_assoc($peliculas)):
    ?>

    <article class="pelicula">
        <a href="entrada.php?id=<?=$pelicula['id']?>">
            <h2><?= $pelicula['titulo'] ?></h2>
            <span class="fecha"><?= $pelicula['categoria'].' | '.$pelicula['fecha'] ?></span>
        </a>
        <p><?= substr($pelicula['descripcion'], 0, 100)."..."  ?></p>
    </article>

    <?php 
            endwhile;
        endif;
    ?>
</div>

<?php require_once 'includes/footer.php'; ?>
</body>
</html>