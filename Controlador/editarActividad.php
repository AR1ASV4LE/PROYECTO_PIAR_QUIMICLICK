<?php
// Habilitar la visualización de errores para depuración
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Incluir la conexión a la base de datos
include("../Controlador/conexion/conexion.php");

// Verificar si se realizó una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el ID de la actividad
    $idActividad = (int)$_POST['id'];

    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $inicio = $_POST['inicio'];
    $finalizacion = $_POST['finalizacion'];

    // Obtener las preguntas y unirlas en un solo string
    $preguntas = isset($_POST['pregunta']) ? $_POST['pregunta'] : [];
    $preguntasString = implode(";", $preguntas); // Usar ";" como separador

    // Preparar la consulta para actualizar la actividad en la base de datos
    $query = "UPDATE actividades SET titulo = ?, descripcion = ?, inicio = ?, finalizacion = ?, pregunta = ? WHERE id = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssssi", $titulo, $descripcion, $inicio, $finalizacion, $preguntasString, $idActividad);
    
    // Ejecutar la consulta y verificar el resultado
    if ($stmt->execute()) {
        // Mostrar mensaje de éxito con alert
        echo "<script>
                alert('¡Éxito! Actividad actualizada con éxito.');
                window.location.href = '../Vista/Actividades.php'; // Cambia esto a tu página de éxito
            </script>";
        exit();
    } else {
        // Mostrar mensaje de error
        echo "<script>
                alert('Error al actualizar la actividad: " . $stmt->error . "');
            </script>";
    
} 
}
?>
