<?php

/***** Inicialización del entorno ******/
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once('./lib/funciones.php');

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

/***** Lógica de negocio ******/

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

function writeCSV($preinfo) {
    $out = fopen('data/users.csv', 'w');
    foreach($preinfo as $clave => $array) {
        fputcsv($out, $array);
    }
    
    if(isset($_GET) && $_GET!=null && $_GET['user']!=null  && $_GET['email']!=null  && $_GET['rol']!=null ) {
        fputcsv($out, array($_GET['user'],$_GET['email'],$_GET['rol'],date('Y-m-d')));
    }
    fclose($out);
}

//*****Lógica de presentación****MARKUPS*****
$loginMarkup = getLoginMarkup();

function getLoginMarkup() {
    return $output = '<form action="" method="get">
    <div class="login-container">
      <h1>USER</h1>
      
      <div class="input-group">
        <label for="user">USUARIO</label>
        <input type="user" name="user" id="user" placeholder="Usuario">
      </div>
  
      <div class="input-group">
          <label for="email">EMAIL</label>
          <input type="email" name="email" id="email" placeholder="your@email.com">
      </div>
      
      <div class="input-group">
          <label for="password">ROL</label>
          <input type="rol" name="rol" id="password" placeholder="ADMIN,USER OR MODER">
      </div>
      
      <button type="submit">CREATE</button>
  </form>';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE USER</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

</head>
<body>

  <?php echo $loginMarkup ?>
  <?php  writeCSV(leerArchivoCSV('data/users.csv'))?>
  <br><br><br><br>
  <a href="user_index.php">VOLVER ATRÁS</a>
    

</body>
</html>