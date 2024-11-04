<?php
include_once('conexion.php');

$nombre = $descripcion = $imagen = "";
$registro = null;

if (isset($_GET['id']) || isset($_POST['id'])) {
    $id = isset($_GET['id']) ? $conexion->real_escape_string($_GET['id']) : $conexion->real_escape_string($_POST['id']);

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $sql = "SELECT nombre, descripcion, imagen FROM registros WHERE id = $id";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $registro = $resultado->fetch_assoc();
        } else {
            echo "Registro no encontrado";
            exit();
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nombre = $conexion->real_escape_string($_POST['nombre']);
        $descripcion = $conexion->real_escape_string($_POST['descripcion']);
        $imagen = $conexion->real_escape_string($_POST['imagen']);

        $sql = "UPDATE registros SET nombre = '$nombre', descripcion = '$descripcion', imagen = '$imagen' WHERE id = $id";
        if ($conexion->query($sql) === TRUE) {
            header("Location: VerDatos.php");
            exit();
        } else {
            echo "Error al actualizar el registro: " . $conexion->error;
        }
    }
} else {
    header("Location: VerDatos.php");
    exit();
}
$conexion->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Registro</title>
    <link rel="stylesheet" href="styleEditar.css">
    <link rel="icon" href="https://i.postimg.cc/76g7vwDv/images.png" type="image/x-icon">
</head>
<body>
    <header>
        <button class='volver' onclick="window.location.href='index.php'">Volver</button>
    </header>
    <div class="contenedor-editar">
        <h2>Editar Registro</h2>
        <?php if ($registro): ?>
            <form method="POST" action="">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($registro['nombre']); ?>" required>

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" required><?php echo htmlspecialchars($registro['descripcion']); ?></textarea>

                <label for="imagen">URL de Imagen:</label>
                <input type="text" id="imagen" name="imagen" value="<?php echo htmlspecialchars($registro['imagen']); ?>">

                <div class="contenedor-botones">
                    <button type="submit">Guardar Cambios</button>
                    <button type="button" class="cancelar" onclick="window.location.href='verDatos.php'">Cancelar</button>
                </div>
            </form>
            
        <?php else: ?>
            <p>No se pudo cargar el registro.</p>
        <?php endif; ?>
    </div>
</body>
</html>