<?php

    //Pagina que recibe la informacion de la vista de usuario para guardar una entrada
    if(isset($_POST)){
    
        require_once '../includes/conexion.php';

        //mysqli_real_escape_string Esta función se usa para crear una cadena SQL legal que se puede usar en una sentencia SQL, escapa los caracteres raros. 
        $titulo = isset($_POST['titulo']) ? mysqli_real_escape_string($db, $_POST['titulo']) : false;
        $descripcion = isset($_POST['descripcion']) ? mysqli_real_escape_string($db, $_POST['descripcion']) : false;
        $categoria = isset($_POST['categoria']) ? $_POST['categoria'] : false; //no utilizamos la funcion escape ya que solo nos llega un numero
        $fecha_estreno = isset($_POST['fecha_estreno']) ? $_POST['fecha_estreno'] : false;
        $trailer = isset($_POST['trailer']) ? $_POST['trailer'] : false;
        $usuario = $_SESSION['usuario']['id'];
        //Guardar imagen
        if(isset($_FILES['imagen'])) {
            $file = $_FILES['imagen']; //guardamos en una variable el archivo imagen que llegara a la variable superglobal con el name del atributo del input
            $filename = $file['name']; //variable que guarda el nombre del archivo
            $mimetype = $file['type']; //recoge el formate de archivo (jpg, png, pdf, jpeg)
            if($mimetype == 'image/jpg' || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') { //solo guardaremos la imagen si viene en los formatos correspondientes

                if(!is_dir('../uploads/images')) {
                    mkdir('../uploads/images', 0777, true); //si no esta creada la carpeta, la creamos con los permisos correspondientes
                }

                move_uploaded_file($file['tmp_name'], '../uploads/images/'.$filename);
                $imagen = $filename;
            }
        }
        
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
                $sql = "UPDATE peliculas SET titulo ='$titulo', descripcion = '$descripcion', categoria_id = $categoria, fecha = '$fecha_estreno'";
                //Comprobar si llega la imagen para editarla
                if(isset($imagen)) {
                    $sql .= ", imagen = '$imagen'";
                }

                //Comprobar trailer al editar y agregar el video via vimeo
                if(isset($trailer)) {
                    $sql .= ", video = '$trailer'";
                }
                $sql .= " WHERE id = $entrada_editar AND usuario_id = $usuario";

                // var_dump($sql);
                // echo "<br>";
                // die();
                
            }else {
                $sql = "INSERT INTO peliculas VALUES(null, $usuario, $categoria, '$titulo', '$descripcion', '$fecha_estreno', '$imagen', NULL);";
            }
            $guardar = mysqli_query($db, $sql); 
            // echo mysqli_error($db);
            // die();
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