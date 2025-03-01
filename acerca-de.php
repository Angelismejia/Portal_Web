<?php
require "motor.php";

<!DOCTYPE html>
<html class="theme-dark" lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="shortcut icon" href="api.png" type="image/x-icon">
    <title>Sistema APIs - Acerca de</title>
    <style>
        .navbar {
            background-color: #f8f9fa;
            padding: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .navbar-menu a {
            margin-left: 20px;
            color: #333;
            text-decoration: none;
        }
        .navbar-menu a:hover {
            color: #007bff;
        }
        .card {
            background-color: rgb(0, 0, 0);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #007bff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <h1 class="title">Acerca de</h1>
        <br>
        <div class='card'>
            <h2 class='title is-4'>Framework usado y por qué</h2>
            <h3 class='subtitle is-5'>Usé <a href="https://bulma.io">Bulma.io</a> para el diseño de la página porque me encantó el diseño que tiene con gran variedad de colores y estilos. Además, tiene una hermosísima documentación y un código muy limpio.</h3>
        </div>
    </div>
    
</body>

</html>
