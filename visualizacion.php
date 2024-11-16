<?php
require 'conexion.php';

// Obtenemos los datos de las vistas
$categorias = $conn->query("SELECT * FROM categorias");
$lugares = $conn->query("SELECT NOMBRE_LUGAR, CATEGORIA_ID, HORARIO_LUGAR FROM lugaresvs");

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="estilos/visualizaciones.css" >
    <title>Visualización de Datos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Visualización de Categorías</h2>
    <table>
        <tr>
            <th>Nombre de Categoría</th>
            <th>ID</th>
            
        </tr>
        <?php while ($row = $categorias->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['NOMBRE_CATEGORIA']; ?></td>
            <td><?php echo $row['CATEGORIA_ID']; ?></td>
            
        </tr>
        <?php } ?>
    </table>

    <h2>Visualización de Lugares</h2>
    <table>
        <tr>
            <th>Nombre de Lugar</th>
            <th>Categoría ID</th>
            <th>Horario de Lugar</th>
        </tr>
        <?php while ($row = $lugares->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['NOMBRE_LUGAR']; ?></td>
            <td><?php echo $row['CATEGORIA_ID']; ?></td>
            <td><?php echo $row['HORARIO_LUGAR']; ?></td>
        </tr>
        <?php } ?>
    </table>

    <form action="index.html" method="get">
        <input type="submit" value="Pagina principal">
    </form>
   
</body>
</html>
