<?php
session_start(); // Inicia la sesión para poder acceder a las variables de sesión
session_unset(); // Libera todas las variables de sesión
session_destroy(); // Destruye la sesión
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sesión cerrada</title>
    <link rel="shortcut icon" href="../Vista/Publico/Imagenes/FAVICON.ico" type="image/x-icon">
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="nombre-pagina">
                <h1>Quimiclick</h1>
            </div>
            <a href="../Vista/Index.php">
                <img class="logo-img" src="./Publico/Imagenes/Logo_página-removebg-preview.png" alt="Logo">
            </a>
        </div>
        <h2>¡SESIÓN CERRADA CON ÉXITO!</h2>
        <img src="./Publico/Imagenes/IMGCLOSE.png" alt="IMG-CLOSE" class="img-close">
        <div class="iconos-enlace">
            <a href="./registrar.php"><ion-icon name="arrow-forward-outline"></ion-icon>Iniciar sesión</a>
            <a href="./Index.php"><ion-icon name="arrow-forward-outline"></ion-icon>Inicio</a>
        </div>
    </div>
</body>

</html>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@500&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Macondo&family=Mali:wght@500&family=Pangolin&family=Shantell+Sans:ital,wght@0,300;0,400;0,500;1,400&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Outfit', sans-serif;
    }

    body {
        background: linear-gradient(to right, #e2e2e2, #c9d6ff);
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
    }

    .container {
        background-color: #ffffff;
        border-radius: 30px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
        max-width: 400px;
        padding: 20px;
        text-align: center;
        transition: transform 0.3s ease;
        animation: fadeIn 1s ease;
    }

    .header {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
        animation: slideDown 1.5s ease forwards;
    }

    .nombre-pagina h1 {
        color: #000;
        font-family: 'Pangolin', sans-serif;
        font-size: 1.8em;
    }

    .logo-img {
        width: 70px;
        height: auto;
        animation: rotateZoom 1.5s ease forwards;
    }

    h2 {
        color: #000;
        font-size: 1.2em;
        font-weight: normal;
        margin-bottom: 20px;
        animation: textFadeIn 1.8s ease forwards;
    }

    .img-close {
        width: 150px;
        height: auto;
        margin: 10px 0;
        animation: rotateIn 1.5s ease forwards;
    }

    .iconos-enlace {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        animation: slideUp 2s ease forwards;
    }

    .iconos-enlace a {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: #000;
        font-weight: normal;
        font-size: 1.1em;
        padding: 10px 20px;
        border: 0px solid #000;
        border-radius: 20px;
        transition: background-color 0.3s, color 0.3s;
    }

    .iconos-enlace a:hover {
        background-color: #ac3846;
        color: white;
    }

    .iconos-enlace ion-icon {
        margin-right: 8px;
        font-size: 1.2em;
    }

    /* Animaciones */

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.9); }
        to { opacity: 1; transform: scale(1); }
    }

    @keyframes glow {
        from { text-shadow: 0 0 5px #ac3846, 0 0 10px #ac3846, 0 0 15px #ac3846; }
        to { text-shadow: 0 0 20px #ac3846, 0 0 30px #ac3846, 0 0 40px #ac3846; }
    }

    @keyframes rotateZoom {
        from { transform: scale(0.5) rotate(-45deg); opacity: 0; }
        to { transform: scale(1) rotate(0deg); opacity: 1; }
    }

    @keyframes slideDown {
        from { transform: translateY(-20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    @keyframes rotateIn {
        from { transform: rotate(-90deg) scale(0.5); opacity: 0; }
        to { transform: rotate(0deg) scale(1); opacity: 1; }
    }

    @keyframes textFadeIn {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
</style>
