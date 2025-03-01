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
            background-color: rgb(255, 255, 255);
            padding: 20px;
            margin-bottom: 20px;
            border-left: 5px solid #007bff;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
        .box {
            background-color: rgb(0, 0, 0);
            padding: 15px;
            margin-bottom: 10px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            color: white;
        }
        .box a {
            color: #00d1b2;
        }
        .button.is-info {
            background-color: #00d1b2;
            border-color: transparent;
        }
        .button.is-info:hover {
            background-color: #00c4a7;
        }
        .images-container {
            display: flex;
            flex-wrap: wrap;
            box-sizing: border-box;
            justify-content: center;
            align-items: center;
        }
        .image {
            border-radius: 5px;
            margin: 10px;
        }
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <?php
        $numero_ejercicio = 8;
        $ejercicio = $exercices[$numero_ejercicio - 1];

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>
        
        <form action="ejercicio8.php" method="post">
            <div class="field">
                <label class="label">Keyword:</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Ingresa una palabra clave" name="dato">
                </div>
                <input style="margin: 15px 0;" class="button is-primary" value="Enviar" type="submit" name="submit">
            </div>

            <?php
            if (!empty($_POST['dato'])) {
                $url = "https://api.genderize.io/?name={$_POST["dato"]}";
                $response = file_get_contents($url);
                $data = json_decode($response, true);

                // Mostrar los resultados de la API
                if (isset($data['gender'])) {
                    echo "<div class='box'>
                            <h3 class='title is-4 has-text-primary'>Género Predicho:</h3>
                            <p class='subtitle is-6'>El género más probable para el nombre {$_POST["dato"]} es: {$data['gender']}</p>
                            <p class='subtitle is-6'>Probabilidad: {$data['probability']}</p>
                          </div>";
                } else {
                    echo "<div class='box'>
                            <h3 class='title is-4 has-text-danger'>Error:</h3>
                            <p class='subtitle is-6'>No se pudo determinar el género para el nombre ingresado.</p>
                          </div>";
                }
            } else {
                echo "<div class='images-container'>";
                for ($i = 0; $i < 24; $i++) {
                    echo "<img class='image is-square' src='https://picsum.photos/200?random={$i}'>";
                }
                echo "</div>";
            }
            ?>
        </form>
    </div>

</body>

</html>
