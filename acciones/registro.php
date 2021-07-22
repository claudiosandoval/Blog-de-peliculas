<?php


if(isset($_POST)){

//conexion a la bd
require_once '../includes/conexion.php';
//Iniciar la sesion
    if(!isset($_SESSION)){
        session_start();    
    }

    //Recoger valores del formulario de registro
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

    if(!empty($contraseña)){
        $password_validado = true;
    }else {
        $password_validado = false;
        $errores['password'] = "La contraseña esta vacia";
    }

    $guardar_usuario = false;
    if(count($errores) == 0) { //al momento de que el array de errores se encuentre vacio y limpio procederemos a guardar al usuario
        $guardar_usuario = true;

        $password_cifrado = password_hash($contraseña, PASSWORD_BCRYPT, ['cost'=>4]); //cost hara 4 pasadas de cifrado en la contraseña

        // var_dump($contraseña);
        // var_dump($password_cifrado);
        // var_dump(password_verify($contraseña, $password_cifrado));
        $sql = "INSERT INTO usuarios VALUES(null, '$nombre', '$apellidos', '$email', '$password_cifrado', CURDATE());";
        $guardar = mysqli_query($db, $sql); 

        // var_dump(mysqli_error($db));
        // die();
        
        if($guardar) {
            $_SESSION['completado'] = "Se ha guardado correctamente el usuario";

        }else {
            $_SESSION['errores']['general'] = "fallo al guardar el usuario";
        }


    }else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: ../index.php');

//var_dump($_POST);