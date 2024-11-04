<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar</title>
    <link rel="stylesheet" href="styleVerDatos.css">
    <link rel="icon" href="https://i.postimg.cc/76g7vwDv/images.png" type="image/x-icon">
</head>
<body>
    <header>
        <button class='agregar' onclick="window.location.href='FormularioAgregar.php'">Agregar</button>
    </header>
    <div class="contenedor-principal">
        <?php
        include_once('conexion.php');

        $sql = "SELECT id, nombre, descripcion, imagen FROM registros";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                echo "<div class='Contenedor'>";
                echo "<p>ID: " . $fila["id"] . "</p>";
                echo "<p>Nombre: " . $fila["nombre"] . "</p>";
                echo "<p>Descripción: " . $fila["descripcion"] . "</p>";
                echo "<img src='" . $fila['imagen'] . "' alt='Imagen' class='dataimagen'>";

                echo "<div class='contenedorbotones'>";
                echo "<button class='editar' onclick='editar(" . $fila["id"] . ")'>Editar</button>";
                echo "<button class='borrar' onclick='borrar(" . $fila["id"] . ")'>Eliminar</button>";
                echo "</div>";

                echo "</div>";
            }
        }
        else{
            echo "Sin Registros";
        }
        ?>
    </div>
    
    <footer>
                <button class='volver' onclick="window.location.href='index.php'">Volver</button>
            </footer>
    <script>

function editar(id) {
    window.location.href = 'editar.php?id=' + id;
}

function borrar(id) {
    if (confirm("¿Seguro que quieres eliminar este registro?")) {
        window.location.href = 'eliminar.php?id=' + id;
    }
}
</script>
</body>
</html>
