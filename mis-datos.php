<?php 
    require_once 'includes/redireccion.php';
    require_once 'includes/header.php';
    require_once 'includes/aside.php'; 
 ?>

<div id="principal">   
    <div class="cuadro">
        <h1>Mis Datos</h1>
    </div>
    <!-- Mostrar errores al insertar usuario-->
    <?php if(isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito"> 
                <?= $_SESSION['completado']; ?> 
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta_error"> 
                <?= $_SESSION['errores']['general']; ?> 
            </div>
        <?php endif ?>
        <!-- Mostrar errores -->

        <form action="acciones/actualizar-usuario.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value=<?=$_SESSION['usuario']['nombre']?>>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'): ''; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos" value=<?=$_SESSION['usuario']['apellidos']?>>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'): ''; ?>

            <label for="email">Email</label>
            <input type="email" name="email" value=<?=$_SESSION['usuario']['email']?>>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'): ''; ?>

            <input type="submit" name="submit" value="Actualizar">
        </form>
        <?php borrarErrores() ?>

</div>

<?php require_once 'includes/footer.php'; ?>