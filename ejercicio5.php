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
        .box img {
            width: 200px;
        }
    </style>
</head>

<body>

    <!-- Cabeza -->
    <?php include "cabeza.php"; ?>

    <!-- Contenido -->
    <div style="width: 90%; margin: 40px auto;">
        <?php
        $ejercicio = $exercices[4]; // Asumiendo que el ejercicio 5 está en la quinta posición

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>
        <form action="ejercicio5.php" method="post">
            <div class="field">
                <label class="label">Nombre un pokemon</label>
                <div class="control">
                    <input class="input" type="text" placeholder="Pikachu" name="dato">
                </div>
                <input style="margin: 15px 0;" class="button is-primary" value="Enviar" type="submit" name="submit">
            </div>
        </form>

        <?php
        if (!empty(trim(@$_POST['dato']))) {
            $pokemon_name = strtolower(trim($_POST['dato'])); // Limpia espacios y pasa a minúsculas
            $url = "https://pokeapi.co/api/v2/pokemon/{$pokemon_name}";

            // Obtener respuesta de la API
            $response = @file_get_contents($url);

            if ($response === FALSE) {
                echo "<p class='button is-small is-danger'>El Pokémon " . $pokemon_name . " no fue encontrado.</p>";
            } else {
                $pokemon = json_decode($response, true);

                // Obtener los datos necesarios
                $nombre = $pokemon['forms'][0]['name'];  
                $exp_base = $pokemon["base_experience"];  
                $img = $pokemon['sprites']['front_default'];
                $habilidades = "<ul>";
                foreach ($pokemon['abilities'] as $ability) {
                    $habilidades .= "<li>" . htmlspecialchars($ability['ability']['name']) . "</li>";
                }
                $habilidades .= "</ul>";

                echo "<h2 class='title is-4'>Resultados</h2><br>";

                echo "<div class='box'>
                        <h3 class='title is-4'>" . strtoupper($pokemon['name']) . "</h3>
                        <p class='subtitle is-4'><strong>Experiencia base:</strong> $exp_base</p>
                        <p class='subtitle is-4'><strong>Habilidades:</strong> $habilidades</p>
                        <img src='$img' alt='$nombre'>
                      </div>";
            }
        } else {
            echo "<p class='button is-small is-danger'>Por favor, ingresa el nombre de un Pokémon.</p>";
        }
        ?>
    </div>

</body>

</html>
