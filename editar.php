<?php include 'conexion.php'; 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $resultado = $conexion->query("SELECT * FROM empleados
                        WHERE id=$id");
        $empleado = $resultado->fetch_assoc();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Nombre del Empleado</label>
        <input type="text" name="nombre" 
        value="<?php echo $empleado['nombre']?>">
        <label for="">Apellido</label>
        <input type="text" name="apellido" id=""
        value="<?php echo $empleado['apellido'] ?>">
        <label for="">Telefono del empleado</label>
        <input type="text" name="telefono" id=""
        value="<?php echo $empleado['telefono'] ?>">
        <label for="">Cargo del Empleado</label>
        <input type="text" name="cargo" 
        value="<?php echo $empleado['cargo'] ?>">
        <button type="submit">Registrar</button>
    </form>

    <?php

if($_SERVER['REQUEST_METHOD']=='POST'){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $cargo = $_POST['cargo'];

    $insertar = $conexion->prepare(
        "UPDATE empleado SET nombre=?, apellido=?,telefono=?,cargo =?
        WHERE id=$id");
    $insertar->bind_param('sss',$nombre,$apellido,$telefono,$cargo);
    $insertar->execute();
    header("Location:index.php");    

}
?>
</body>
</html>