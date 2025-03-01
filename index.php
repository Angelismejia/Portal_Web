<?php
  require "motor.php";
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
      background-color:rgb(0, 0, 0);
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
    <h1 class="title">Ejercicios</h1>
    <br>
    <?php 
      foreach ($exercices as $exercice) {
        echo "<div class='card'>";
        echo "<h2 class='title is-4'>{$exercice["name"]}</h2>";
        echo "<h3 class='subtitle is-5'>{$exercice["description"]}</h3>";
        echo "<a class='button is-link' href='{$exercice["link"]}'>Ver API</a>";
        echo "</div>";
      }
    ?>
  </div>
  
</body>

</html>
