<?php
require_once '../Controlador/conexion/conexion.php'; // Archivo para la conexión a la base de datos
include '../Vista/sidebar.php';

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
// Obtener los retos de la base de datos
$query = "SELECT * FROM retos";
$result = $conexion->query($query);

// Verificar si la consulta fue exitosa
if (!$result) {
    die("Error al ejecutar la consulta: " . $conexion->error);
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Retos disponibles</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="../Vista/Publico/Imagenes/FAVICON.ico" type="image/x-icon">
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
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
            height: 100vh;
            overflow-y: hidden;
        }

        .container {
            background-color: #fff;
            border-radius: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
            width: 90%;
            max-width: 1000px;
            margin: 50px auto;
            text-align: center;
            padding: 30px;
            margin-right:50px;
        }

        h1 {
            color: #333;
            margin-bottom: 20px;
        }

        .carousel-container {
            display: flex;
            align-items: center;
            overflow: hidden;
            position: relative;
            margin-bottom: 20px;
        }

        .cards-container {
            display: flex;
            transition: transform 0.3s ease;
            min-width: 100%;
            gap: 10px;
        }

        .card {
    flex: 0 0 auto;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    width: 230px;
    margin: 5px;
    text-align: center;
    transition: transform 0.5s;
    margin-left: 55px; /* Ajusta este valor para reducir el espacio */
}


        .card:hover {
            transform: scale(1.05);
        }

        .card-content {
            padding: 15px;
        }

        .link-button {
            text-decoration: none;
            display: inline-block;
            padding: 10px 20px;
            background-color: #ac3846;
            color: white;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .link-button:hover {
            background-color: #84545b;
            transform: translateY(-2px);
        }

        .carousel-btn {
            background-color: #ffffff;
            border: none;
            font-size: 30px;
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            padding: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s, transform 0.3s;
            z-index: 1;
        }

        .carousel-btn:hover {
            background-color: #eaeaea;
            transform: scale(1.1);
        }

        .left-btn {
            left: 10px;
        }

        .right-btn {
            right: 10px;
        }

        .icon-container {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: -5px;
        }

        .icon {
            cursor: pointer;
            font-size: 20px;
            transition: color 0.3s, transform 0.3s;
            margin-top: 10px;
            margin-right: 10px;
        }

        .icon:hover {
            color: #ac3846;
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Retos disponibles</h1>
        <div class="carousel-container">
            <button class="carousel-btn left-btn" onclick="moveCarousel(-1)">❮</button>
            <div class="cards-container">
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <div class="card" data-id="<?php echo $row['id']; ?>">
                            <div class="icon-container">
                                <div class="icon icon-delete" onclick="eliminarReto(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-trash-alt"></i>
                                </div>
                                <div class="icon icon-edit" onclick="editarReto(<?php echo $row['id']; ?>)">
                                    <i class="fas fa-edit"></i>
                                </div>
                            </div>
                            <div class="card-content">
                                <h2 class="card-title"><?php echo $row['titulo']; ?></h2>
                                <p class="card-description"><?php echo $row['descripcion']; ?></p>
                                <a class="link-button" href="<?php echo $row['link_quizizz']; ?>">Acceder al Reto</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php else: ?>
                    <p>No hay retos disponibles.</p>
                <?php endif; ?>
            </div>
            <button class="carousel-btn right-btn" onclick="moveCarousel(1)">❯</button>
        </div>
    </div>

    <script>
        let currentIndex = 0;

        function moveCarousel(direction) {
            const cardsContainer = document.querySelector('.cards-container');
            const cards = document.querySelectorAll('.card');
            const cardWidth = cards[0].offsetWidth + 10; // Ajustado para el margen

            currentIndex += direction;

            // Evitar que el índice exceda los límites
            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > cards.length - 1) {
                currentIndex = cards.length - 1;
            }

            cardsContainer.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
        }
    </script>

</body>
</html>
