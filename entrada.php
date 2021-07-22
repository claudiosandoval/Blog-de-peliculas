<?php require_once 'includes/header.php'; ?> <!-- helpers se inicializa en header por lo que lo posicionamos encima del todo para poder utilizar las funciones correspondientes -->
<?php
    $peliculaEspecifica = conseguirPelicula($db, $_GET['id']);
    var_dump($peliculaEspecifica);
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
    <a href="categoria.php?id=<?=$peliculaEspecifica['categoria_id']?>">
        <h2>
            <?=$peliculaEspecifica['categoria']?>
            <span style="font-size:14px"><?=$peliculaEspecifica['fecha']?></span>
        </h2> 
    </a>
    <p><?=$peliculaEspecifica['descripcion']?></p> 
    <br>
    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $peliculaEspecifica['usuario_id']): ?>
        <a href="editar-entrada.php?id=<?=$peliculaEspecifica['id']?>" class="boton">Editar pelicula</a>
        <a href="acciones/borrar-entrada.php?id=<?=$peliculaEspecifica['id']?>" class="boton">Borrar pelicula</a>
    <?php endif; ?>
</div>


<?php require_once 'includes/footer.php'; ?>
</body>
</html>