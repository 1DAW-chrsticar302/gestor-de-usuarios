<?php

    function dump($var){
        echo '<pre>'.print_r($var,1).'</pre>';
    }

    $editMarkup = editUserMarkup();

    function editUserMarkup() {
        $output = '<form action="" method="get">
        <div class="login-container">
        <h1>EDIT USER</h1>
        <input type="hidden" name="userId" value="'.$_GET['userId'].'">';

        if(isset($_GET['user'])) {
            $output.='<input type="hidden" name="userGuardado" value="'.$_GET['user'].'">';
        }

      
        if(isset($_GET['user']) && $_GET['user']!=null)  {
            $user = unserialize(base64_decode($_GET['user']));

            $output.='<div class="input-group">
            <label for="user">USUARIO</label>
            <input type="user" name="name" id="user" placeholder="'.$user[0].'">
            </div>
  
            <div class="input-group">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="'.$user[1].'">
            </div>
      
            <div class="input-group">
                <label for="password">ROL</label>
                <input type="rol" name="rol" id="password" placeholder="'.$user[2].'">
            </div>
      
            <button type="submit">EDITAR</button>
            </form>';

        }else {

            $output.='<div class="input-group">
            <label for="user">USUARIO</label>
            <input type="user" name="name" id="user" placeholder="'.$_GET['name'].'">
            </div>
  
            <div class="input-group">
                <label for="email">EMAIL</label>
                <input type="email" name="email" id="email" placeholder="'.$_GET['email'].'">
            </div>
      
            <div class="input-group">
                <label for="password">ROL</label>
                <input type="rol" name="rol" id="password" placeholder="'.$_GET['rol'].'">
            </div>
      
            <button type="submit">EDITAR</button>
            </form>';

        }

        return $output;
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

    
    function writeCSV($preinfo) {
        if(isset($_GET['name']) && isset($_GET['email']) && isset($_GET['rol']) && isset($_GET['userGuardado'])) {
            $userPrevio = unserialize(base64_decode($_GET['userGuardado']));
            $out = fopen('data/users.csv', 'w');
        foreach($preinfo as $clave => $array) {
            if($clave == $_GET['userId']) {
                fputcsv($out, array($_GET['name'],$_GET['email'],$_GET['rol'],$userPrevio[3]));
            }
            else {
                fputcsv($out, $array);
            }
        }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    
    <?php echo $editMarkup ?>
    <?php  writeCSV(leerArchivoCSV('data/users.csv'))?>
    <br>
    <a href="user_index.php">VOLVER ATRÁS</a>

</body>
</html>