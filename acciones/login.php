<?php 

//Iniciar la session y la conexion
require_once '../includes/conexion.php';

//Recoger datos del formulario
if($_POST) {

    //borrar error antiguo si es que el usuario no ha ingresado un email o contraseña correctos
    if(isset($_SESSION['error-login'])) {
        session_unset();
    }

    //recoger datos del formularios
    $email = trim($_POST['email']);
    $contraseña = $_POST['password'];

    //Hacer el match con una consulta y comprobar las credenciales del usuario
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1) {
        //guardamos al usuario en un arreglo asociativo
        $usuario = mysqli_fetch_assoc($login);
        //var_dump($usuario);
        //die();
        //Comprobar la contraseña
        $verificado = password_verify($contraseña, $usuario['password']);

        if($verificado) {
            //Utilizar una sesion para guardar los datos del usuario logeado
            $_SESSION['usuario'] = $usuario;
            
        }else {
            //Si hay fallos enviar esos errores
            $_SESSION['error-login'] = "El email y contraseñas son incorrectos";
           
        }
    }else {
        //Si hay fallos enviar esos errores
        $_SESSION['error-login'] = "No se ha encontrado ningun usuario con ese email";
    }

    
}

//Redirigir al index
header('Location: ../index.php');