<?php include 'conexion.php'; 

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $conexion->query("DELETE FROM empleados
                        WHERE id=$id");
    }
    header("Location:index.php");
?>