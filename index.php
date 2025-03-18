<?php include ("conexion.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab1-C2</title>
</head>
<body>
    <h1>Listado de Empleados</h1>
    <?php
    $liest = $conexion->query('SELECT * from empleados');
    echo '<table>
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>telefono</th>
                        <th>cargo</th>
                    </tr>
                </thead>
                <tbody>';
    while ($fila = $liest->fetch_assoc()) {
        echo "<tr>
                    <td>{$fila['nombre']}</td>
                    <td>{$fila['telefono']}</td>
                    <td>{$fila['cargo']}</td>
                    <td><a href='editar.php?id={$fila['id']}'>Editar</a></td>
                    <td><a href='eliminar.php?id={$fila['id']}'>Eliminar</a></td>
                    </tr>
                   
                ";
    }
    echo '</tbody>
                </table> ';
    ?>
</body>

<?php include 'footer.php' ?>

</html>