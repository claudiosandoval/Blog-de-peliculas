<?php 
    require_once 'includes/header.php';
    require_once 'includes/aside.php'; 
 ?>

<div id="principal">   
    <div class="cuadro">
        <h1>Agregar Peliculas</h1>
    </div>
    <form action="acciones/guardar-entrada.php" method="POST" enctype="multipart/form-data">
        <p>Agrega nuevas peliculas a la filmoteca</p>
        <br>
        <label for="titulo">Titulo: </label>
        <input type="text" name="titulo">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?>

        <label for="nombre">Descripción: </label>
        <textarea name="descripcion" id="" cols="30" rows="10"></textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?>

        <label for="categoria">Categoria: </label>
        <select name="categoria" id="">
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):   
            ?>
                <option value="<?=$categoria['id']?>">
                        <?=$categoria['nombre']?>
                </option>
            <?php
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?>
        <label for="imagen">Imagen:</label>
        <input type="file" name="imagen">
        <label for="fecha_estreno">Fecha de estreno: </label>
        <input type="date" name="fecha_estreno">
        <input type="submit" value="Guardar">
    </form>
    <?=borrarErrores()?>

</div>

<?php require_once 'includes/footer.php'; ?>


