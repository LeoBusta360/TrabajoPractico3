<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingresar Datos</title>
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="icon" href="https://i.postimg.cc/76g7vwDv/images.png" type="image/x-icon">
    <title>CRUD</title>
</head>
<body>
<?php
        include_once('conexion.php');
    ?>

    <pre>
    <header>
        <button class='volver' onclick="window.location.href='index.php'">Volver</button>
    </header>
        <form action="InsertarDatos.php" method="post">
            <label>ID</label>                                            
            <input type="number" name='id'></input>        
    
            <label>Nombre</label>
            <input type="text" name='nombre'></input>  

            <label>Descripcion</label>
            <input type="text" name='descripcion'></input> 

            <label>Imagen</label>
            <input type="url" name='imagen'></input>

            <button type="submit">Enviar</button>

        </form>
    </pre>

</body>

</html>