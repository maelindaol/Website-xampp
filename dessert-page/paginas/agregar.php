<?php

    include('includes/utilerias.php');

    session_start();

    if(!isset($_SESSION['usuario'])){
        redireccionar('Acceso denegado','index.php');
        die();
    }

    include('includes/encabezado.php');
?>

<script src="../scripts/formulario-postre.js" defer></script>

<div class="formulario-div">
    
    <form action="agregar-manejo.php" method="post" enctype="multipart/form-data">
        <h3>Nuevo postre</h3>
        <hr>
        <label for="postre">Postre</label>
        <input type="text" id="postre" name="postre" required>

        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" id="descripcion" cols="30" rows="3" required></textarea>

        <label for="precio">Precio</label>
        <input type="number" id="precio" name="precio" step=".01" required>

        <label for="tipo">Tipo</label>
        <select name="tipo" id="tipo">
            <option value="Pastel" selected>Pastel</option>
            <option value="Mostachón">Mostachón</option>
            <option value="Pay">Pay</option>
        </select>

        <label for="imagen">Imagen</label>
        <input type="file" name="imagen" id="imagen">

        <input type="submit" value="Guardar" name="guardar" class="boton">

    </form>
</div>

<?php
    include('includes/pie.php');
?>