<?php

if(!isset($_SESSION)) {
    session_start();
}
    
//evitamos que se ingrese a las pestañas protegidas por administrador
if(!isset($_SESSION['usuario'])) {
    header("Location: index.php");
}

?>