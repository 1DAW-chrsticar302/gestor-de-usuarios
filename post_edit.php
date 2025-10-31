<?php

function dump($des){
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


function getProperties($id) {
    $usuario = null;
    $lista = leerArchivoCSV("data/users.csv");

    foreach($lista as $clave => $user) {
        if ($clave == $id) {
            $usuario = $user;
        }
    }
    return $usuario;
}


$userId = $_GET['id'];
$user = getProperties($_GET['id']);

function getEditMarkup($usuario,$id) {
    
    //Aquí poner el mismo cuestionario que en el user_create, luego cambiar para
    //  que se autil
    //Aquí va el imprimir y ver los datos en el placeholder
    //Enviará lo puesto en post a otro php para editar el usuario, pasándole 
    // el nuevo usuario y el id del anterior para que pueda cambiarlo.
    
    $output = '
        <div class="cuestionario">
        <form action="editar.php" method="post" enctype="multipart/form-data">
            <div>
            <label for="imagen">Selecciona tu imágen de perfil:</label>
            <input type="file" name="imagen" accept="image/*">
            </div>

            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" placeholder="'.$usuario[0].'">
            </div>

            <div>
                <label for="email">Correo:</label>
                <input type="email" name="email" placeholder="'.$usuario[1].'">
            </div>

            <div>
                <label for="rol">Rol:</label>
                <input type="text" name="rol" placeholder="'.$usuario[2].'">
            </div>

            <input type="hidden" name="idPrevio" value="'.$id.'">
            <input type="hidden" name="userPrevio" value="'.base64_encode(serialize($usuario)).'">

            <input type="submit" value="Editar">

        </form>
        </div>
    ';

    return $output;
}

$editMurkup = getEditMarkup($user,$userId);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDIT USER</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

    <style>

    .cuestionario{
        place-self: center;
        border: solid orange 4px;
        box-shadow: 3px 3px 6px orange, -3px -3px 6px orange;
        border-radius: 5%;
        padding: 5%;
        margin-top: 20%;
    }

    </style>

</head>
<body>
    <?php echo $editMurkup ?>
</body>
</html>