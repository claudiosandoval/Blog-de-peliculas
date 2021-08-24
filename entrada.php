<?php require_once 'includes/header.php'; ?> <!-- helpers se inicializa en header por lo que lo posicionamos encima del todo para poder utilizar las funciones correspondientes -->
<?php
    $peliculaEspecifica = conseguirPelicula($db, $_GET['id']);
    //var_dump($peliculaEspecifica);
    if(!isset($peliculaEspecifica['id'])) {
        header("Location: index.php");
    }
?>
<?php require_once 'includes/aside.php'; ?>

<div id="principal">   
    <div class="cuadro">
        <h1><?=$peliculaEspecifica['titulo']?></h1>
    </div>
    <p style="color:gray">Post by <?=$peliculaEspecifica['usuario']?></p>
    <br>
    <img src="uploads/images/<?=$peliculaEspecifica['imagen']?>" alt="imagen pelicula" width="184" height="273">
    <a href="categoria.php?id=<?=$peliculaEspecifica['categoria_id']?>">
        <h2>
            <?=$peliculaEspecifica['categoria']?>
            <span style="font-size:14px"><?=$peliculaEspecifica['fecha']?></span>
        </h2> 
    </a>
    <p><?=$peliculaEspecifica['descripcion']?></p> 
    <h2>Trailer</h2>
    <!-- Video JS -->
    <!-- <video id="my-video" class="video-js" controls preload="auto" width="640" height="480" poster="MY_VIDEO_POSTER.jpg" data-setup="{}">
        <source src="assets/videos/<?=$peliculaEspecifica['titulo']?>.mp4" type="video/mp4"/>
        <source src="MY_VIDEO.webm" type="video/webm"/>
        <p class="vjs-no-js">
        To view this video please enable JavaScript, and consider upgrading to a
        web browser that
        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
    </video> -->
    <iframe src="https://player.vimeo.com/video/<?=$peliculaEspecifica['video']?>" width="640" height="360" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" allowfullscreen></iframe>
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $peliculaEspecifica['usuario_id']): ?>
        <a href="editar-entrada.php?id=<?=$peliculaEspecifica['id']?>" class="boton">Editar pelicula</a>
        <a href="acciones/borrar-entrada.php?id=<?=$peliculaEspecifica['id']?>" class="boton">Borrar pelicula</a>
    <?php endif; ?>
</div>


<?php require_once 'includes/footer.php'; ?>
</body>
</html>