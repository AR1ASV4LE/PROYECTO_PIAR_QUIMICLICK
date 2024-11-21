<?php  
error_reporting(E_ALL);
ini_set('display_errors', 1);

ob_start(); // Iniciar el almacenamiento en búfer de salida
include("../Controlador/conexion/conexion.php"); // Incluir la conexión a la base de datos
include ("../Vista/sidebar.php");

if (!isset($_SESSION['idusuario'])) {
    header("Location: ./Index.php"); // Redirigir a index.php si no hay sesión
    exit(); // Asegurarse de que el script se detenga después de redirigir
}

// Verificar si el ID se pasó en la URL
if (!isset($_GET['id'])) {
    echo "ID de actividad no especificado.";
    exit(); // Detener la ejecución si el ID no está presente
}

$idActividad = (int)$_GET['id']; // Asegurarse de que el ID es un entero

// Consultar la actividad por ID
$query = "SELECT * FROM actividades WHERE id = ?";
$stmt = $conexion->prepare($query);
$stmt->bind_param("i", $idActividad);
$stmt->execute();
$result = $stmt->get_result();
$actividad = $result->fetch_assoc();

// Verificar si la actividad existe
if (!$actividad) {
    echo "Actividad no encontrada.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Actividad</title>
</head>
<body>

<div class="container">
    <div class="title">Editar Actividad</div>
    <form role="form" method="post" action="../Controlador/editarActividad.php" enctype="multipart/form-data">
        <div class="input-box">
            <input type="text" placeholder="Ingrese el título de la actividad" name="titulo" value="<?php echo htmlspecialchars($actividad['titulo']); ?>" required>
        </div>
        <div class="input-box">
            <textarea placeholder="Describa la actividad" name="descripcion" rows="2" required><?php echo htmlspecialchars($actividad['descripcion']); ?></textarea>
        </div>
        <div class="input-box">
            <label for="inicio">Fecha de inicio:</label>
            <input type="date" id="inicio" name="inicio" value="<?php echo htmlspecialchars($actividad['inicio']); ?>" required>

            <label for="finalizacion">Fecha de finalización:</label>
            <input type="date" id="finalizacion" name="finalizacion" value="<?php echo htmlspecialchars($actividad['finalizacion']); ?>" required>
        </div>

        <div id="questions-container">
        <?php
        // Fetch the single string of questions
        $preguntaQuery = "SELECT pregunta FROM actividades WHERE id = ?";
        $preguntaStmt = $conexion->prepare($preguntaQuery);
        $preguntaStmt->bind_param("i", $idActividad);
        $preguntaStmt->execute();
        $preguntaResult = $preguntaStmt->get_result();
        $preguntaRow = $preguntaResult->fetch_assoc();

        // Check if there are questions to display
        if ($preguntaRow && !empty($preguntaRow['pregunta'])) {
            // Split the questions into an array
            $preguntas = explode(";", $preguntaRow['pregunta']);

            // Display each question in its own input field
            foreach ($preguntas as $index => $pregunta) {
                echo '<div class="question-group">';
                echo '<div class="input-box">';
                echo '<input type="text" placeholder="Pregunta ' . ($index + 1) . '" name="pregunta[]" value="' . htmlspecialchars(trim($pregunta)) . '" required>';
                echo '</div>';
                echo '<span class="remove-question" onclick="removeQuestion(this)">Eliminar Pregunta</span>';
                echo '</div>';
            }
        } else {
            echo '<p>No hay preguntas para mostrar.</p>'; // Message if there are no questions
        }
        ?>
        </div>

        <button type="button" onclick="addQuestion()">Agregar Pregunta</button>

        <div class="button">
            <input type="hidden" name="id" value="<?php echo $idActividad; ?>"> <!-- Agregar el ID de la actividad -->
            <input type="submit" value="Actualizar Actividad">
        </div>
    </form>
</div>

<script>
    function addQuestion() {
        var questionsContainer = document.getElementById('questions-container');
        var questionCount = questionsContainer.getElementsByClassName('question-group').length + 1;

        var questionGroup = document.createElement('div');
        questionGroup.className = 'question-group';
        questionGroup.innerHTML = `
            <div class="input-box">
                <input type="text" placeholder="Pregunta ${questionCount}" name="pregunta[]" required>
            </div>
            <span class="remove-question" onclick="removeQuestion(this)">Eliminar Pregunta</span>
        `;
        questionsContainer.appendChild(questionGroup);
    }

    function removeQuestion(element) {
        element.parentElement.remove();
    }
</script>

</body>
</html>

<style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Outfit', sans-serif;
        }

        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            display: flex;
            flex-direction: column; /* Cambiar a columna */
            height: 100vh;
            overflow-y: auto; /* Permitir desplazamiento vertical */
        }

        .container {
            background-color: #fff;
            border-radius: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            display: flex; 
            flex-direction: column; /* Mantener disposición en columna */
            margin: 20px auto; /* Centrar el contenedor horizontalmente */
            padding: 20px; 
            width: 90%;
            max-width: 700px;
            margin-right: 250px;
            margin-bottom: 100px; /* Espacio extra en la parte inferior */
        }

        .title {
            font-size: 20px; 
            color: #333;
            margin-bottom: 20px; 
            text-align: center;
        }

        .input-box {
            margin-bottom: 15px;
        }

        .input-box input, .input-box textarea {
            width: 100%; /* Usar 100% del ancho disponible */
            padding: 8px 10px; 
            border-radius: 8px;
            border: 1px solid #ccc;
            font-size: 13px; 
            outline: none;
            background-color: #eee;
        }

        .button {
            margin-top: 15px; 
            display: flex; 
            justify-content: center; 
        }

        .button input[type="submit"] {
            background-color: #ac3846;
            color: white;
            padding: 8px 20px; 
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            text-transform: uppercase;
        }

        .question-group {
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px; 
            background-color: #f9f9f9;
        }

        .remove-question {
            color: red;
            cursor: pointer;
            margin-top: 5px;
        }

        button {
            background-color:  #2497c3;
            color: white;
            padding: 8px 10px; 
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 14px;
            margin-bottom: 20px; 
        }

        .barra-lateral {
            margin-left: -5px;
        }
    </style>
