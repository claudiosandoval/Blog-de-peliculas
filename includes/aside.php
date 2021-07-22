<aside id="sidebar">

    <div id="buscador" class="bloque">
        <h3>Buscar</h3>

        <?php if(isset($_SESSION['error-login'])): ?>
            <div class="alerta alerta_error">
                <?= $_SESSION['error-login']; ?>
            </div>
        <?php endif; ?>
        <form action="buscar.php" method="POST">
            <input type="text" name="busqueda">
            <input type="submit" value="Buscar">
        </form>
    </div>
    
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario_logeado" class="bloque">
            <h3 style="color:white; float:left; margin-right:5px">Bienvenido</h3><h3><?=$_SESSION['usuario']['nombre'].' '.$_SESSION['usuario']['apellidos'];?></h3>
            <a href="crear-entradas.php" class="boton">Publicar pelicula</a>
            <a href="crear-categoria.php" class="boton">Crear categoria</a>
            <a href="mis-datos.php" class="boton">Mis datos</a>
            <a href="acciones/logout.php" class="boton">Cerrar sesion</a>
        </div>
    <?php endif; ?>
    <?php if(!isset($_SESSION['usuario'])): ?>
    <div id="login" class="bloque">
        <h3>Identificate (Solo para administradores)</h3>
        <?php if(isset($_SESSION['error-login'])): ?>
            <div class="alerta alerta_error">
                <?= $_SESSION['error-login']; ?>
            </div>
        <?php endif; ?>
        <form action="acciones/login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email">
            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <input type="submit" value="Entrar">
        </form>
    </div>
    <div id="register" class="bloque" style="display:none">
        <?php if(isset($_SESSION['errores'])): ?>
            <?php  ?>
        <?php endif; ?>
        <h3>Registrate</h3>

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

        <form action="acciones/registro.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre'): ''; ?>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos'): ''; ?>

            <label for="email">Email</label>
            <input type="email" name="email">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email'): ''; ?>

            <label for="password">Contraseña</label>
            <input type="password" name="password">
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password'): ''; ?>

            <input type="submit" name="submit" value="Registrar">
        </form>
        <?php borrarErrores() ?>
    </div>
    <?php endif; ?>
</aside>