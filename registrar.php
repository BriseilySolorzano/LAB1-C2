<?php include 'conexion.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Empleado</label>
        <input type="text" name="nombre">
        <label for="">Apellido</label>
        <input type="text" name="apellido" id="">
        <label for="">Telefono</label>
        <input type="text" name="telefono" id="">
        <label for="">Cargo</label>
        <input type="text" name="cargo" id="">
        <button type="submit">Registrar</button>
    </form>

    <?php

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $telefono = $_POST['telefono'];
            $cargo = $_POST['cargo'];

            $insertar = $conexion->prepare(
                'INSERT INTO empleados (nombre
                ,apellido,telefono,cago)VALUES(?,?,?)');
            $insertar->bind_param('sss',$nombre,$apellido,$telefono,$cargo);
            $insertar->execute();
            header("Location:index.php");    

        }
    ?>
</body>
</html>