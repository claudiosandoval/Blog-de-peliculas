<!-- HEAD -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bl🪐g de peliculas</title>
    <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Codystar:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Mono:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
</head>
<body>

<header id="cabecera">
    <div id="logo">
        <a href="index.php">
            Bl🪐g de peliculas
        </a><span style="color:white; background-color:black; font-family: 'Space Mono', monospace; font-weight:normal; font-style:italic;">Tu espacio, tus peliculas</span>
    </div>
    <!-- MENU  -->
    <nav id="menu">
        <ul>
            <li>
                <a href="index.php">Inicio</a>
            </li>
            <li>
                <a href="index.php">Categoria 1</a>
            </li>
            <li>
                <a href="index.php">Categoria 2</a>
            </li>
            <li>
                <a href="index.php">Categoria 3</a>
            </li>
            <li>
                <a href="index.php">Categoria 4</a>
            </li>
            <li>
                <a href="index.php">Sombre mi</a>
            </li>
            <li>
                <a href="index.php">Contacto</a>
            </li>
        </ul>      
    </nav>

    <div class="clearfix"></div>
</header>

<div id="contenedor">
    <aside id="sidebar">
        <div id="login" class="bloque">
            <h3>Identificate</h3>
            <form action="login.php" method="post">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="Entrar">
            </form>
        </div>
        <div id="register" class="bloque">
            <h3>Registrate</h3>
            <form action="registro.php" method="post">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre">
                <label for="apellidos">Apellidos</label>
                <input type="text" name="apellidos">
                <label for="email">Email</label>
                <input type="email" name="email">
                <label for="password">Contraseña</label>
                <input type="password" name="password">
                <input type="submit" value="Registrar">
            </form>
        </div>
    </aside>

    <!-- PRINCIPAL  -->
    <div id="principal">   
        <div class="cuadro">
            <h1>ULTIMAS PELICULAS</h1>
        </div>
        <article class="pelicula">
            <a href="">
                <h2>Titulo de mi pelicula</h2>
            </a>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, asperiores. Eaque sequi quasi esse ipsum beatae consequatur aspernatur quas fuga!</p>
        </article>
        <article class="pelicula">
            <a href="">
                <h2>Titulo de mi pelicula</h2>
            </a>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, asperiores. Eaque sequi quasi esse ipsum beatae consequatur aspernatur quas fuga!</p>
        </article>
        <article class="pelicula">
            <a href="">
                <h2>Titulo de mi pelicula</h2>
            </a>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, asperiores. Eaque sequi quasi esse ipsum beatae consequatur aspernatur quas fuga!</p>
        </article>
        <article class="pelicula">
            <a href="">
                <h2>Titulo de mi pelicula</h2>
            </a>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, asperiores. Eaque sequi quasi esse ipsum beatae consequatur aspernatur quas fuga!</p>
        </article>
        <article class="pelicula">
            <a href="">
                <h2>Titulo de mi pelicula</h2>
            </a>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nostrum, asperiores. Eaque sequi quasi esse ipsum beatae consequatur aspernatur quas fuga!</p>
        </article>
        <div id="ver-todas">
            <a>Ver todas las peliculas</a>
        </div>
    </div>
        <div class="clearfix"></div>
</div>

    <!-- FOOTER -->
    <footer id="pie">
        <p>Desarrollado por Claudio Sandoval &copy; 2021</p>
    </footer>

</body>
</html>