
<?php
    include('includes/utilerias.php');

    session_start();

    if(!isset($_SESSION['usuario'])){
        redireccionar('Acceso Denegado','index.php');
        die();
    }
    else{
        session_unset();
        session_destroy();
        redireccionar('Sesion Cerrada','index.php');
    }
?>