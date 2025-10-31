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
    $output .= '<div class="user"><div>'.$userId.'</div><div>'.$user[0].' </div><div> '.$user[2].'</div>
    <a href="user_info.php?user='.base64_encode(serialize($user)).'"><button>VER</button></a>
    <a href="post_edit.php?id='.$userId.'"><button>EDITAR</button></a>
    <a href="user_delete.php?userId='.$userId.'&&user='.base64_encode(serialize($user)).'"><button>ELIMINAR</button></a></div>';
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
    <!-- <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> -->

    <style>
  body{
    background-color: rgba(0,0,0,0.95);
    font-family: "Inter", sans-serif;
    line-height: 1.5;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    padding-top: 5vh;
    padding-bottom: 5vh;
  }

  .content {
    color:white;
    place-self:center;
    margin:10%;
    width: 90%;
    border: solid 4px orange;
    box-shadow: 3px 3px 6px orange, -3px -3px 6px orange;
    border-radius:20px;
    display:grid;
    grid-template-rows: repeat(12, 1fr);
  }

  button {
    color: #090909;
    padding: 0.7em 1.7em;
    font-size: 12px;
    border-radius: 0.5em;
    background: #e8e8e8;
    cursor: pointer;
    border: 1px solid #e8e8e8;
    transition: all 0.3s;
    box-shadow: 3px 3px 6px #c5c5c5, -3px -3px 6px #ffffff;
  }

  button:hover {
    box-shadow: 6px 6px 12px #c5c5c5, -6px -6px 12px #ffffff;
  }

  button:active {
    color: #666;
    box-shadow: inset 6px 6px 12px #c5c5c5, inset -6px -6px 12px #ffffff;
  }

  .content div {
    padding:1%;
  }

  a{
    float:right;
    margin-left:5%;
  }

  .user{
    float: left;
    border: solid 1px grey;
    border-radius: 10px;
    margin: 0.2%;
    padding: 0;
    background-image: url("./src/464.jpg");
    background-size: 209px;
    overflow: hidden;
    display:grid;
    grid-template-columns: repeat(6,1fr);
  }

    .dividir div{
      float: left;
    }


  </style>

</head>
<body>
  <center>
  <a href="user_create.php" style="float:none;">
    <button>Crear User</button>
  </a>
  </center>
  <div class="content">
    <?php echo mostrarUsuarios(leerArchivoCSV('data/users.csv')) ?>
  </div>

</body>
</html>