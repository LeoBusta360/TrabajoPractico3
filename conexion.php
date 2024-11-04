<?php
$servidor = 'mysql-agusc13.alwaysdata.net';
$usuario = 'agusc13_usuario';
$contrasena = 'Agustin15lol';
$bd = 'agusc13_mi_crud';

$conexion = new mysqli($servidor, $usuario, $contrasena, $bd);


if ($conexion->connect_error) {

    echo 'error de conexion';
    die($conexion->connect_error);
} 

