<?php

    include('includes/utilerias.php');

    if(empty($_POST)){
        redireccionar('Acceso Denegado','index.php');
        return;
    }

    $postre = validar($_POST['postre']);
    $descripcion = validar($_POST['descripcion']);
    $precio = validar($_POST['precio']);
    $tipo = validar($_POST['tipo']);

    if($postre == '' || $descripcion == ''|| $precio == '' || $tipo == ''){
        redireccionar('Información no válida','agregar.php');
        return;
    }

    $conexion = conectar();

    $imagen = subir_imagen($_FILES['imagen']);

    $sql = "insert into postre(postre,descripcion,precio,tipo,imagen)
    values('$postre','$descripcion','$precio','$tipo','$imagen')";

    $resultado= mysqli_query($conexion,$sql);

    if($resultado){
        redireccionar('Los datos fueron guardados de forma existosa','agregar.php');
    }
    else{
        redireccionar('Hubo un error: ' . mysqli_error($conexion),'agergar.php');
    }

    mysqli_close($conexion);

?>