<?php
// Conectar a la base de datos
include '../Controlador/conexion/conexion.php';

// Verifica si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recoge los datos del formulario
    $id = $_POST['id'];
    $novedad = $_POST['novedad'];
    $fecha_publacion = $_POST['fecha_publicacion'];
    $hora_publicacion = $_POST['hora_publicacion'];

    // Prepara la consulta de actualización
    $query = "UPDATE novedades SET novedad = ?, fecha_publicacion = ?, hora_publicacion = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssi", $novedad, $fecha_publacion, $hora_publicacion, $id);

    // Ejecuta la consulta
    if ($stmt->execute()) {
        // Si la actualización fue exitosa, muestra la alerta y redirige
        echo '<script>
                alert("Acabas de editar la novedad");
                window.location.href = "../Vista/Novedades.php";
              </script>';
    } else {
        echo "Error al actualizar la novedad: " . $stmt->error;
    }

    // Cierra la conexión
    $stmt->close();
    $conexion->close();
}
?>
