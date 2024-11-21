<?php
// eliminarActividad.php
session_start();
include("../Controlador/conexion/conexion.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM actividades WHERE id = ?";
    
    // Preparar la consulta
    if ($stmt = $conexion->prepare($query)) {
        $stmt->bind_param("i", $id);
        
        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "<script>alert('Actividad eliminada correctamente.'); window.location.href='../Vista/Actividades.php';</script>";
        } else {
            echo "<script>alert('Error al eliminar la actividad. Inténtalo de nuevo.'); window.location.href='../Vista/Actividades.php';</script>";
        }
        
        $stmt->close();
    } else {
        echo "<script>alert('Error al preparar la consulta.'); window.location.href='../Vista/Actividades.php';</script>";
    }
} else {
    echo "<script>alert('ID de actividad no especificado.'); window.location.href='../Vista/Actividades.php';</script>";
}

?>