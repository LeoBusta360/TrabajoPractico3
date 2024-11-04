<?php

include_once('conexion.php');


if (isset($_GET['id'])) {
    
    $id = $conexion->real_escape_string($_GET['id']);

    $sql = "DELETE FROM registros WHERE id = $id";

    
    if ($conexion->query($sql) === TRUE) {
       
        header("Location: VerDatos.php"); 
        exit();
    } else {
       
        echo "Error al eliminar el registro: " . $conexion->error;
    }
} else {
    
    header("Location: VerDatos.php");
    exit();
}


$conexion->close();

