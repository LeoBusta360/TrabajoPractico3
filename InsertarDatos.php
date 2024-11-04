<?php
include_once('conexion.php');

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$descripcion=$_POST['descripcion'];
$imagen=$_POST['imagen'];


$sql = "INSERT INTO registros (id,nombre,descripcion,imagen)
VALUES ('$id','$nombre','$descripcion','$imagen')";

if ($conexion->query($sql) === TRUE) {
    header("Location: index.php?insertado=true");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

$conexion->close();
