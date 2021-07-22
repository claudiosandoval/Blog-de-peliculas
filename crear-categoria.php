<?php 
    require_once 'includes/header.php';
    require_once 'includes/aside.php'; 
 ?>

<div id="principal">   
    <div class="cuadro">
        <h1>CREAR CATEGORIAS</h1>
    </div>
    <form action="acciones/guardar-categoria.php" method="POST">
        <p>Agregar nuevas categorias de peliculas</p>
        <br>
        <label for="nombre">Nombre: </label>
        <input type="text" name="nombre">

        <input type="submit" value="Guardar">
    </form>

</div>

<?php require_once 'includes/footer.php'; ?>


