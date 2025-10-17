<?php

function leerArchivoCSV($rutaArchivoCSV) {
  $tablero = [];

  if (($puntero = fopen($rutaArchivoCSV, "r")) !== FALSE) {
      while (($datosFila = fgetcsv($puntero)) !== FALSE) {
          $tablero[] = $datosFila;
      }
      fclose($puntero);
  }
  return $tablero;
}

function mostrarUsuarios($usuariosList) {
  $output = '';
  
  foreach($usuariosList as $userId => $user) {
    $output .= '<div class="user">'.$user[0].' | '.$user[1].' | '.$user[2].' | '.$user[3].'</div>';
  }

  return $output;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

    <style>

    .content {
      margin:10%;
      width: 90%;
      height:600px;
      border: solid 4px grey;
      box-shadow: grey;
      display:grid;
      grid-template-rows: repeat(12, 1fr);
    }

    .user{
      float: left;
      border: solid 1px grey;
      margin: 0;
      padding: 0;
      background-image: url("./src/464.jpg");
      background-size: 209px;
      background-repeat: none;
      overflow: hidden;
    }


    </style>

</head>
<body>
  <div class="content">
    <?php echo mostrarUsuarios(leerArchivoCSV('data/users.csv')) ?>
  </div>
 <a href="user_create.php">Crear User</a>

</body>
</html>