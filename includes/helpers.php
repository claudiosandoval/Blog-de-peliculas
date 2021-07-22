<?php 

function mostrarError($errores, $campo) { //funcion para mostrar errores en el html
    $alerta = '';
    if(isset($errores[$campo]) && !empty($campo)){
        $alerta = "<div class='alerta alerta_error'>".$errores[$campo]."</div>";
    }

    return $alerta;
    
}

function borrarErrores() { //utilizado en aside y crear entradas, categorias
    $borrado = false;

    if(isset($_SESSION['errores'])){
        $_SESSION['errores'] = null;
        //$borrado = session_unset(); 
    }

    if(isset($_SESSION['completado'])){
        $_SESSION['completado'] = null;
        //$borrado = session_unset();  
    }  
    
    if(isset($_SESSION['errores_entrada'])){
        $_SESSION['errores_entrada'] = null;
        //$borrado = session_unset(); 
    }

    return $borrado;
}

function conseguirCategorias($conexion) { //retorna todas las categorias de las peliculas
    $sql = "SELECT * FROM categorias ORDER BY id ASC;";
    $categorias = mysqli_query($conexion, $sql);

    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >=1) {
        $resultado = $categorias;
    }
    
    
    return $resultado;
}

function conseguirCategoria($conexion, $id) { //retorna todas las categorias de las peliculas
    $sql = "SELECT * FROM categorias WHERE id = $id;";
    $categorias = mysqli_query($conexion, $sql);

    
    $resultado = array();
    if($categorias && mysqli_num_rows($categorias) >=1) {
        $resultado = mysqli_fetch_assoc($categorias);
    }
    
    
    return $resultado;
}

function conseguirPelicula($conexion, $id) {
    $sql = "SELECT p.*, c.nombre as 'categoria', CONCAT(u.nombre, ' ', u.apellidos) as usuario FROM peliculas p
            INNER JOIN categorias c ON c.id = p.categoria_id
            INNER JOIN usuarios u ON p.usuario_id = u.id
            WHERE p.id = $id;";
    $categorias = mysqli_query($conexion, $sql);

    
    //$resultado = array();
    if($categorias && mysqli_num_rows($categorias) >=1) {
        $resultado = mysqli_fetch_assoc($categorias);
    }
    
    
    return $resultado;
};


function conseguirPeliculas($conexion, $limit = null, $categoria = null, $busqueda = null) { //Conseguir todas las entradas (peliculas) segun su categoria, de esta manera estamos parametrizando la funcion y reutilizandola para no tener codigo redundante
    $sql = "SELECT p.*, c.nombre as 'categoria' FROM peliculas p
            INNER JOIN categorias c ON c.id = p.categoria_id 
            ";  

    if(!empty($categoria)){ //si categoria no esta vacio y viene con un numero
        $sql .= "WHERE p.categoria_id = $categoria";
    }

    if(!empty($busqueda)){  
        $sql .= "WHERE p.titulo LIKE '%$busqueda%'";
    }

    $sql .= " ORDER BY p.id DESC ";

    if($limit) {
        $sql .= "LIMIT 4";
    } 

    //echo $sql; 
    //die();

    $peliculas = mysqli_query($conexion, $sql);

    $resultado = array();

    if($peliculas && mysqli_num_rows($peliculas) >= 1) {
        $resultado = $peliculas;
    }

    return $resultado;

}


