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

function eliminarUser($preinfo) {
    $out = fopen('data/users.csv', 'w');
    foreach($preinfo as $clave => $array) {
        if($clave == $_GET['userId']) {
           
        }
        else {
            fputcsv($out, $array);
        }
    }
}

function getConfirmacionMarkup() {
    if (isset($_GET['confirmacion'])) {
        $output = '<div class="content">
        <div class="frase">USUARIO ELIMINADO</div>
        <div class="botones">
            '.eliminarUser(leerArchivoCSV("data/users.csv")).'<a href="user_index.php">VOLVER AL INDEX</a>
        </div>
        </div>';
    }
    else {
        if(isset($_GET['rechazo'])) {
            $output = '<div class="content">
            <div class="frase">OPERACIÓN CANCELADA</div>
            <div class="botones">
            <a href="user_index.php">VOLVER AL INDEX</a>
            </div>
            </div>';
        }else{
            $output = '
            <div class="content">
            <div class="frase">¿ Seguro que quieres eliminar este usuario ?</div>
            <div class="botones">
                <form action="" method="get">
                    <input type="hidden" name="userId" value="'.$_GET['userId'].'">
                    <input type="hidden" name="confirmacion" value="true">
                    <button style="margin-left=5%" type="submit">SI</a>
                </form>

                <form action="" method="get">
                    <input type="hidden" name="userId" value="'.$_GET['userId'].'">
                    <input type="hidden" name="rechazo" value="true">
                    <button type="submit">NO</a>
                </form>
            </div>
            </div>';
        }

    }
    return $output;
}

$deleteMarkup = getConfirmacionMarkup();


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DELETE USER</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

    <style>
        .content {
            width: 500px;
            height: 200px;
            margin-top: 50%;
            place-self: center;
            border: solid 4px grey;
            box-shadow: grey;
            display:grid;
            grid-template-rows: repeat(2, 1fr);
        }

        .frase {
            place-self: center;
        }

        .botones {
            width: 100%;
            place-self: center;
            display:grid;
            grid-template-columns: repeat(2, 1fr);
        }

        .botones button{
            float:right;
            width: calc(100%/2);
            margin:10%;
        }
    </style>

</head>
<body>
    <?php echo $deleteMarkup ?>
</body>
</html>