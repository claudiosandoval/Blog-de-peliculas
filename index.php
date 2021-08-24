<?php require_once 'includes/header.php'; ?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">   
    <div class="cuadro">
        <h1>ULTIMAS PELICULAS</h1>
    </div>

    <?php
        $peliculas = conseguirUltimasPeliculas($db, true);
        if(!empty($peliculas)):
            while($pelicula = mysqli_fetch_assoc($peliculas)):
    ?>

    <article class="pelicula">
        <a href="entrada.php?id=<?=$pelicula['id']?>">
            <br>
            <img src="uploads/images/<?=$pelicula['imagen']?>" alt="imagen pelicula" width="184" height="273">
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
<script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
</body>
</html>