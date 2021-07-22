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
        <h1>Editar Peliculas</h1>
    </div>
    <form action="acciones/guardar-entrada.php?editar=<?=$peliculaEspecifica['id']?>" method="POST">
        <p>Pagina de edicion para <?=$peliculaEspecifica['titulo']?></p>
        <br>
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$peliculaEspecifica['titulo']?> ">
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'titulo'): ''; ?>

        <label for="nombre">Descripción: </label>
        <textarea name="descripcion" id="" cols="30" rows="10"><?=$peliculaEspecifica['descripcion']?> </textarea>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'descripcion'): ''; ?>

        <label for="categoria">Categoria: </label>
        <select name="categoria" id="">
            <?php 
                $categorias = conseguirCategorias($db);
                if(!empty($categorias)):
                    while($categoria = mysqli_fetch_assoc($categorias)):   
            ?>
                <option value="<?=$categoria['id']?>" <?=($categoria['id'] == $peliculaEspecifica['categoria_id']) ? 'selected = selected' : ''?>>
                        <?=$categoria['nombre']?>
                </option>
            <?php
                    endwhile;
                endif;
            ?>
        </select>
        <?php echo isset($_SESSION['errores_entrada']) ? mostrarError($_SESSION['errores_entrada'], 'categoria'): ''; ?>

        <input type="submit" value="Guardar">
    </form>
    <?=borrarErrores()?>

</div>

<?php require_once 'includes/footer.php'; ?>