<?php

    //Pagina que recibe la informacion de la vista de usuario para guardar la categoria
    if(isset($_POST)){
    
        require_once '../includes/conexion.php';

        //mysqli_real_escape_string Esta función se usa para crear una cadena SQL legal que se puede usar en una sentencia SQL, escapa los caracteres raros. 
        $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;

        // Array de errores

        $errores = array();

        //Validar datos antes de guardarlos en la bd

        if(!empty($nombre) && !is_numeric($nombre) && !preg_match("/[0-9]/", $nombre)){
            $nombre_validado = true;
        }else {
            $nombre_validado = false;
            $errores['nombre'] = "El nombre no es valido";
        }

        if(count($errores) == 0) { //al momento de que el array de errores se encuentre vacio y limpio procederemos a guardar al usuario

            $sql = "INSERT INTO categorias VALUES(null, '$nombre');";
            $guardar = mysqli_query($db, $sql); 
        }
    }

    header("Location: ../index.php");

    

?>