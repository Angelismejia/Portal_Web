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
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <?php
        $numero_ejercicio = 7;
        $ejercicio = $exercices[$numero_ejercicio - 1];

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>
        
        <form action="ejercicio7.php" method="post">
            <div class="field">
                <label class="label">Escriba una cantidad en USD para la conversión</label>
                <div class="control">
                    <input class="input" type="number" placeholder="5" name="dato" step="any">
                </div>
                <input style="margin: 15px 0;" class="button is-primary" value="Enviar" type="submit" name="submit">
            </div>

            <?php
            if (!empty(@$_POST['dato'])) {
                $_POST['dato'] = floatval($_POST['dato']);
                $url = "https://open.er-api.com/v6/latest/USD";
                $response = @file_get_contents($url);
                $data = json_decode($response, true);
                
                foreach ($data["rates"] as $key => $value) {
                    $conversion = $value * $_POST['dato'];
                    echo "<div class='box'>
                        <h3 class='title is-4 has-text-primary'>{$key}</h3>
                        <p class='subtitle is-6'>\${$_POST['dato']} USD son {$conversion} {$key}</p>
                        </div>";
                }
            }
            ?>
        </form>
    </div>

</body>
</html>
