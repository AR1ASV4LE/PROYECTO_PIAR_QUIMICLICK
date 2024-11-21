<?php
include '../Controlador/conexion/conexion.php';
include './sidebar.php';
// Consulta para obtener las novedades
$sql = "SELECT * FROM novedades";
$result = $conexion->query($sql);
$isTeacherOrAdmin = isset($_SESSION['rol']) && ($_SESSION['rol'] === 'docente' || $_SESSION['rol'] === 'administrador');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Novedades</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        /* Apply the same styles from your profile page */
        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
            font-family: 'Outfit', sans-serif;
        }
        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            position: relative;
            width: 60%; /* Cambiado de 80% a 60% */
            max-width: 800px; /* Añadido para limitar el ancho máximo */
            padding: 20px;
            text-align: center;
            margin-right: -120px;
        }
        h2 {
            color: #333;
            margin-top: 20px;
        }
        form {
            margin: 20px 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        input[type="date"], input[type="time"], textarea {
            width: 80%;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 14px;
            margin-bottom: 10px;
            background-color: #eee;
        }
        input[type="submit"] {
            background-color: #ac3846;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            text-transform: uppercase;
        }
        input[type="submit"]:hover {
            background-color: #84545b;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ccc;
            text-align: center;
        }
        th {
            background-color: #f3f3f3;
        }
        .actions a {
            text-decoration: none;
            padding: 5px 10px;
            color: #fff;
            background-color: #0bc7e8;
            border-radius: 5px;
            margin: 0 5px;
        }
        .actions a:hover {
            background-color: #085775;
        }

        .button {
            position: absolute; /* Posicionar absolutamente */
            top: -5px; /* Espacio desde la parte superior */
            right: 30px; /* Espacio desde la derecha */
        }

        .button input[type="button"] {
            background-color: #ac3846; /* Color del botón */
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 100;
            text-transform: uppercase;
            
        }

        .button input[type="button"]:hover {
            background-color: #84545b; /* Color al pasar el ratón */
        }
    </style>
</head>
<body>
<?php if ($isTeacherOrAdmin): ?>
            <div class="button">
                <input type="button" value="Lista de novedades" onclick="location.href='./Novedades.php'">
            </div>
        <?php endif; ?>

<div class="container">
    <h2>Añadir Novedad</h2>
    <form action="../Controlador/procesar_novedad.php" method="post">
        <textarea name="novedad" placeholder="Novedad" required></textarea><br>
        
        <label for="fecha">Fecha de Publicación:</label>
        <input type="date" name="fecha" required><br>
        <label for="fecha">Hora de Publicación:</label>
        <input type="time" name="hora" placeholder="Hora" required><br>
        <input type="submit" value="Añadir Novedad">
    </form>
    <script>
function disableButton() {
    const button = document.getElementById("submitBtn");
    button.disabled = true; // Disable the button
    return true; // Allow form submission
}
</script>

</body>
</html>
