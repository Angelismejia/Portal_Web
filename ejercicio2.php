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
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <?php
        $ejercicio = $exercices[0]; // Asumiendo que el ejercicio 1 está en la primera posición

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>
        <form action="ejercicio.php" method="post">
            <div class="field">
                <label class="label">Nombre</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Ingresa un nombre" name="dato">
                </div>
                <input style="margin: 15px 0;" class="button is-primary" value="Enviar" type="submit" name="submit">
            </div>
        </form>

        <?php
        if (!empty($_POST['dato'])) {
            $url = "https://api.agify.io/?name=" . urlencode($_POST["dato"]);
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            // Mostrar los datos
            echo "<div class='card'>";
            echo "<h2 class='title is-4'>Resultados</h2>";
            echo "<p class='subtitle is-5'>El nombre es {$data["name"]} y especulo que tenga {$data["age"]} años de edad.</p>";
            echo "</div>";
        }
        ?>
    </div>

</body>

</html>
