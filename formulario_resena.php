<?php
// Iniciamos la sesión
session_start();

if (!isset($_SESSION['usuario_id'])) {

    header("Location: iniciar_sesion.php");
    exit;
}
require 'conexion.php';


$lugares = $conn->query("SELECT LUGAR_ID, NOMBRE_LUGAR FROM lugares");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Reseña</title>
</head>
<body>
    <h2>Registrar Reseña</h2>
    <form action="insertar_resena.php" method="post">
        <label for="lugar">Lugar:</label><br>
        <select id="lugar" name="lugar_id" required>
           <option value="">Seleccionar</option>
           <?php while ($row = $lugares->fetch_assoc()) { ?>
            <option value="<?php echo $row['LUGAR_ID']; ?>"><?php echo $row['NOMBRE_LUGAR']; ?></option>
           <?php } ?>
        </select>
        <br><br>

        <label for="calificacion">Calificación:</label><br>
        <select id="calificacion" name="calificacion_resena" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br><br>

        <label for="comentario">Comentario:</label><br>
        <textarea id="comentario" name="comentario_resena" rows="4" cols="50" placeholder="Escribe tu comentario aquí" required></textarea><br><br>

        <!-- Campo para enviar el USUARIO_ID -->
        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['usuario_id']; ?>">

        <input type="submit" value="Registrar Reseña">
    </form>
    <br>
    <form action="formulario_modificacion.php" method="get">
        <input type="submit" value="Modificar Reseñas">
    </form>
    <br>
    <form action="cerrar_sesion.php" method="post">
        <input type="submit" value="Cerrar Sesión">
    </form>
</body>
</html>


