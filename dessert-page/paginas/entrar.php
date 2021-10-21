<?php
    include('includes/utilerias.php');
    
    session_start();
    if(isset($_SESSION['usuario'])){
        redireccionar('La sesión ya esta iniciada','index.php');
        die();
    }
    include('includes/encabezado.php')
?>

<div class="formulario-div">
    <form action="entrar-manejo.php" method="post">
        <h3>Datos</h3>
        
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario">
        
        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password">
        
        <input type="submit" value="Entrar" name="entrar" class="boton">
    </form>
</div>

<?php
    include('includes/pie.php')
?>