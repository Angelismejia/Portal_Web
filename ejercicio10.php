<?php
require_once "motor.php";
?>

<!DOCTYPE html>
<html class="theme-dark" lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@1.0.2/css/bulma.min.css">
    <link rel="shortcut icon" href="api.png" type="image/x-icon">
    <title>Sistema APIs</title>
    <style>
        .box {
            background-color: rgb(0, 0, 0);
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .button.is-link {
            background-color: #3273dc;
            border-color: transparent;
        }
        .button.is-link:hover {
            background-color: #2766b0;
        }
        .notification.is-danger {
            background-color: #f14668;
            color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <?php
        $ejercicio = $exercices[9]; // Asumiendo que el ejercicio 10 está en la décima posición

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>

        <?php
        // Obtener el chiste de la API
        $url = "https://official-joke-api.appspot.com/random_joke";
        $response = @file_get_contents($url);

        if ($response !== false) {
            $data = json_decode($response, true);
            $setup = $data['setup'];
            $punchline = $data['punchline'];

            echo "<div class='box'>
                    <p class='title is-4'>{$setup}</p>
                    <p class='subtitle is-5'><strong>{$punchline}</strong></p>
                </div>
                <a class='button is-link' style='margin: 10px 0;' href='ejercicio10.php'>Generar otro chiste</a>";
        } else {
            echo "<p class='notification is-danger'>No se pudo obtener un chiste en este momento.</p>";
        }
        ?>
    </div>

</body>

</html>
