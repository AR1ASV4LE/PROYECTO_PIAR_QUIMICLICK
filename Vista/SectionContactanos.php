<?php
include ('../Vista/sidebar.php')
?>
<style>
    .barra-lateral{
        margin-left: -70px;
    }
</style>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QuimiClick - Contáctanos</title>
    <link rel="stylesheet" href="./CSS/SectionContactanos.css">
    <!-- GOOGLE FONTs -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- ANIMATE CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <!-- FAVICON DE LA PAGINA -->
    <link rel="shortcut icon" href="./Publico/Imagenes/FAVICON.ico" type="image/x-icon">
    <style>
        body {
            background-color: #c9d6ff;
            background: linear-gradient(to right, #e2e2e2, #c9d6ff);
            line-height: 1.2;
        }

        .content {
            margin-right:20px;
            margin-top: 30px;
        }

        .footer {
            margin-top: 100px;
            background-color: #0bc7e8;
            text-align: center;
            width: 95.3%;
            padding: 10px;
            color: #252237;
            position: absolute;
            bottom:-2;
            margin-right: -10px;
        }

        .footer-content {
            max-width: 800px;
            margin: 0 auto;
            font-size: 15px;
            padding-left: 150px;
        }

        .footer p {
            margin: 0;
        }

        .footer a {
            color: #ac3846;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer a:hover {
            color: #258790;
            text-decoration: underline;
        }

        @media (max-width: 600px) {
            .footer-content {
                padding: 0 10px;
            }
        }
    </style>
</head>
<body>
    <main>
        <div class="content">
            <div class="contact-wrapper animated bounceInUp">
                <div class="contact-form">
                    <h3>Contáctanos</h3>
                    <form id="contactForm" action="https://formsubmit.co/quimiclickscience@gmail.com" method="POST">
                        <p>
                            <label>Nombre</label>
                            <input type="text" id="firstname" name="firstname" required>
                        </p>
                        <p>
                            <label>Apellido</label>
                            <input type="text" id="lastname" name="lastname" required>
                        </p>
                        <p>
                            <label>Correo electrónico</label>
                            <input type="email" name="email" required>
                        </p>
                        <p class="block">
                            <label>Mensaje</label> 
                            <textarea name="message" rows="3" required></textarea>
                        </p>
                        <p class="block">
                            <button type="submit">Enviar</button>
                        </p>
                    </form>
                </div>
                <div class="contact-info">
                    <h4>Más información</h4>
                    <ul>
                        <li><i class="fas fa-phone"></i> 3216746710</li>
                        <li><i class="fas fa-envelope-open-text"></i> quimiclickscience@gmail.com</li>
                    </ul>
                    <p>Estamos aquí para apoyarte. Si tienes alguna duda o consulta, no dudes en escribirnos. ¡Estamos listos para ayudarte a alcanzar tus metas académicas!</p>
                </div>
            </div>
        </div>
    </main> 

    <footer class="footer">
        <div class="footer-content">
            <p>&copy; 2024 Quimiclick. Todos los derechos reservados.</p>
            <p><a href="#">Términos de Servicio</a> | <a href="#">Política de Privacidad</a></p>
        </div>
    </footer>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            var firstname = document.getElementById('firstname').value;
            var lastname = document.getElementById('lastname').value;

            var fullname = firstname + ' ' + lastname;
            var input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'fullname';
            input.value = fullname;

            this.appendChild(input);
        });
    </script>
</body>
</html>
