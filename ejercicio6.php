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
    <title>Noticias desde WordPress 📰</title>
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
        $ejercicio = $exercices[5]; // Asumiendo que el ejercicio 6 está en la sexta posición

        // Mostrar la información
        echo "<h1 class='title'>{$ejercicio["name"]}</h1>";
        echo "<h2 class='subtitle' style='margin: 0;'>{$ejercicio['description']}</h2>";
        echo "<a class='button' style='margin: 10px 0;' href='{$ejercicio['link']}' target='_blank'>Ver API</a>";
        ?>

        <div class="section">
            <div class="container">
                <h2 class="title">Últimas Noticias</h2>
                <?php
                // URL de la API de WordPress
                $url = "https://public-api.wordpress.com/rest/v1.1/freshly-pressed/";

                // Obtener los datos de la API
                $response = file_get_contents($url);
                $data = json_decode($response, true);

                // Verificar si la respuesta es válida
                if ($data && isset($data["posts"])) {
                    foreach (array_slice($data["posts"], 0, 10) as $post) {
                        $title = $post["title"];
                        $link = $post["URL"];
                        $excerpt = strip_tags($post["excerpt"]);
                        $blog_name = $post["site_name"];
                ?>
                        <div class="box">
                            <article class="media">
                                
                                <div class="media-content">
                                    <div class="content">
                                        <p>
                                            <strong><?php echo $title; ?></strong> <small><?php echo $blog_name; ?></small><br>
                                            <?php echo $excerpt; ?>
                                            <br>
                                            <a href="<?php echo $link; ?>" class="button is-info is-small" target="_blank">Leer más</a>
                                        </p>
                                    </div>
                                </div>
                            </article>
                        </div>
                <?php
                    }
                } else {
                    echo "<p>No se pudieron obtener las noticias.</p>";
                }
                ?>
            </div>
        </div>
    </div>

</body>
</html>
