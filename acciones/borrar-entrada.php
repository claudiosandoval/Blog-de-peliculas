<?php
    require_once '../includes/conexion.php';
    //session_start();
    if(isset($_SESSION['usuario']['id']) && isset($_GET['id'])) {
        $entrada_id = $_GET['id'];
        $usuario_id = $_SESSION['usuario']['id'];
        $sql = "DELETE FROM peliculas WHERE usuario_id = $usuario_id AND id = $entrada_id";
        $borrar = mysqli_query($db, $sql);

        //mysqli_error($db, $borrar);
    }

    header('Location: ../index.php');

?>