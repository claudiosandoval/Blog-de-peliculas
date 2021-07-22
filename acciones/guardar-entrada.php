<?php

    //Pagina que recibe la informacion de la vista de usuario para guardar una entrada
    if(isset($_POST)){
    
        require_once '../includes/conexion.php';

        //mysqli_real_escape_string Esta función se usa para crear una cadena SQL legal que se puede usar en una sentencia SQL, escapa los caracteres raros. 
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false; //no utilizamos la funcion escape ya que solo nos llega un numero
        $usuario = $_SESSION['usuario']['id'];

        // Array de errores

        $errores = array();

        //Validar datos antes de guardarlos en la bd

        if(empty($titulo)){
            $errores['titulo'] = "El titulo no es valido";
        }

        if(empty($descripcion)){
            $errores['descripcion'] = "La descripcion no es valida";
        }

        if(empty($categoria) && !is_numeric($categoria)){
            $errores['categoria'] = "Seleccione una categoria";
        }

        //var_dump($errores);
        //die();

        if(count($errores) == 0) { //al momento de que el array de errores se encuentre vacio y limpio procederemos a guardar al usuario

            if(isset($_GET['editar'])) {
                $entrada_editar = $_GET['editar'];
                $sql = "UPDATE peliculas SET titulo ='$titulo', descripcion = '$descripcion', categoria_id = $categoria".
                " WHERE id = $entrada_editar AND usuario_id = $usuario";
            }else {
                $sql = "INSERT INTO peliculas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', CURDATE());";
            }
            $guardar = mysqli_query($db, $sql); 
            //var_dump(mysqli_error());
            //die();
            header("Location: ../index.php");  
        }else {
            $_SESSION["errores_entrada"] = $errores;
            //var_dump($errores);
            //die();
            if(isset($_GET['editar'])) {
                header("Location: ../editar-entrada.php?id=".$_GET['editar']); //Redireccionara a editar si encuentra el parametro get editar de lo contrario se asume que esta agregando y pasara al index
            }else {
                header("Location: ../crear-entradas.php");  
            }
        }
    }
    

    

?>