<?php

if(isset($_POST)){

//conexion a la bd
require_once '../includes/conexion.php';

    //Recoger valores del formulario de actualizacion
    $nombre =isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $contraseña = isset($_POST['password']) ? mysqli_real_escape_string($db,$_POST['password']) : false;

    // Array de errores

    $errores = array();

    //Validar datos antes de guardarlos en la bd

    if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
        $nombre_validado = true;
    }else {
        $nombre_validado = false;
        $errores['nombre'] = "El nombre no es valido";
    }

    if(!empty($apellidos) && !is_numeric($apellidos) && !preg_match("/[0-9]/", $apellidos)){
        $apellidos_validado = true;
    }else {
        $apellidos_validado = false;
        $errores['apellidos'] = "Los apellidos no son validos";
    }

    if(!empty($email) && filter_var($email,FILTER_VALIDATE_EMAIL)){
        $email_validado = true;
    }else {
        $email_validado = false;
        $errores['email'] = "El email no es valido";
    }


    $guardar_usuario = false;
    if(count($errores) == 0) { //al momento de que el array de errores se encuentre vacio y limpio procederemos a guardar al usuario
        $guardar_usuario = true;
        $usuario = $_SESSION['usuario'];
        //Comprobar si el correo existe en la base de datos
        $sql = "SELECT id, email from usuarios WHERE email = '$email'"; //comprobamos si el email ingresado por la vista existe en la base de datos 
        $isset_email = mysqli_query($db, $sql);
        $isset_user = mysqli_fetch_assoc($isset_email);

        if($isset_user['id'] == $usuario['id'] || empty($isset_user)){ //solo actualizaremos el usuario cuando sea igual al id del usuario autenticado o tambien si el correo no existe en la bd
            //Consulta para actualizar el usuario
            
            $sql = "UPDATE usuarios SET ". 
                        "nombre = '$nombre', ".
                        "apellidos = '$apellidos', ".
                        "email = '$email' ".
                        "WHERE id = ".$usuario['id'];
            $guardar = mysqli_query($db, $sql);     

            // var_dump(mysqli_error($db));
            // die();
            
            if($guardar) {
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email; 
                $_SESSION['completado'] = "Tus datos se han actualizado correctamente";

            }else {
                var_dump(mysqli_error($db));
                die();
                $_SESSION['errores']['general'] = "Fallo al actualizar tus datos";
            }

        }else {
            $_SESSION['errores']['general'] = "El usuario ya existe en nuestros registros"; //en el caso de que isset_user no este vacio significa que existe ese correo en la bd
        }
    }else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: ../mis-datos.php');

//var_dump($_POST);


?>