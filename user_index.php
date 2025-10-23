<?php
function dump($var){
    $des = base64_decode(unserialize($var));
    echo '<pre>'.print_r($des,1).'</pre>';
}


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
    $output .= '<div class="user">'.$userId.' | '.$user[0].' | '.$user[2].'
    <a href="user_info.php?user='.base64_encode(serialize($user)).'">VER</a>
    <a href="user_edit.php?userId='.$userId.'&&user='.base64_encode(serialize($user)).'">EDITAR</a>
    <a href="user_delete.php?userId='.$userId.'&&user='.base64_encode(serialize($user)).'">ELIMINAR</a></div>';
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
    
    a{
      float:right;
      margin-left:5%;
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