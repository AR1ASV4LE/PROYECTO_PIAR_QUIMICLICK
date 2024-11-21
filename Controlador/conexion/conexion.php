<?php
// Parámetros de configuración de la base de datos
$host = "localhost";
$basededatos = "quimiclick";
$usuariodb = "root"; // Asegúrate de usar 'root' si no has creado otro usuario
$clavedb = ""; // Deja vacío si 'root' no tiene contraseña

// Crear conexión
$conexion = new mysqli($host, $usuariodb, $clavedb, $basededatos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
