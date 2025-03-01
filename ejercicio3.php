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
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <?php
        $ejercicio = $exercices[2]; // Asumiendo que el ejercicio 3 está en la tercera posición

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>
        <form action="ejercicio3.php" method="post">
            <div class="field">
                <label class="label">Nombre un país</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Ingresa el nombre de un país para mostrar las universidades" name="dato">
                </div>
                <input style="margin: 15px 0;" class="button is-primary" value="Enviar" type="submit" name="submit">
            </div>
        </form>

        <?php
        if (!empty($_POST['dato'])) {
            $url = "http://universities.hipolabs.com/search?country=" . urlencode($_POST["dato"]);
            $response = file_get_contents($url);
            $universidades = json_decode($response, true);

            // Mostrar los datos
            echo "<h2 class='title is-4'>Resultados</h2><br>";

            foreach ($universidades as $universidad) {
                $nombre = $universidad['name'];  
                $dominio = !empty($universidad['domains']) ? implode(", ", $universidad['domains']) : "No disponible";  
                $pagina_web = !empty($universidad['web_pages'][0]) ? $universidad['web_pages'][0] : "No disponible";  

                echo "<div class='box'>
                        <h3 class='title is-5'>$nombre</h3>
                        <p><strong>Dominio:</strong> $dominio</p>
                        <p><strong>Página web:</strong> <a href='$pagina_web' target='_blank'>$pagina_web</a></p>
                      </div>";
            }
        } else {
            echo "<p>No se ha proporcionado un país.</p>";
        }
        ?>
    </div>

</body>

</html>
