<?php
function dump($des){
    echo '<pre>'.print_r($des,1).'</pre>';
}

dump($_POST);
dump($_FILES);
dump(unserialize(base64_decode($_POST['userPrevio'])));

$previoUser = unserialize(base64_decode($_POST['userPrevio']));
$nuevoUser = array($_POST['name'],$_POST['email'],$_POST['rol'],$previoUser[3],$_FILES['imagen']['name']);

$totalUser = array(1,2,3,4,5);

//Aquí hago el usuario final a introducir, si no le paso un atributo por post, deja el anterior
if($nuevoUser[0] != null) {
    $totalUser[0] = $nuevoUser[0];
}else {
    $totalUser[0] = $previoUser[0];
}

if($nuevoUser[1] != null) {
    $totalUser[1] = $nuevoUser[1];
}else {
    $totalUser[1] = $previoUser[1];
}

if($nuevoUser[2] != null) {
    $totalUser[2] = $nuevoUser[2];
}else {
    $totalUser[2] = $previoUser[2];
}


$totalUser[3] = $previoUser[3];


if($nuevoUser[4] != null) {
    $totalUser[4] = $nuevoUser[4];
}else {
    $totalUser[4] = $previoUser[4];
}

dump($totalUser);

//Procesado de la imagen
if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
    $archivoTmp = $_FILES['imagen']['tmp_name'];
    $nombreOriginal = basename($totalUser[0] . '_' . $totalUser[2] . '_' . $_FILES['imagen']['name']);
    $carpetaDestino = 'imagenes/';
// Crear carpeta si no existe
    if (!is_dir($carpetaDestino)) {
        mkdir($carpetaDestino, 0755, true);
    }
// Ruta final
    $rutaFinal = $carpetaDestino . $nombreOriginal;
// Mover el archivo
    if (move_uploaded_file($archivoTmp, $rutaFinal)) {
        writeCSV(leerArchivoCSV("data/users.csv"));
        header("Location: user_index.php");
        exit();
    } else {
        echo "Error al mover la imagen.";

    }
} else {
    echo "No se ha introducido imagen";

    //cambiar el nombre de la imagen del usuario anterior
    //otra opción es crear el id.

    header("Location: user_index.php");
}


writeCSV(leerArchivoCSV("data/users.csv"),$_POST['idPrevio'],$totalUser);

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

function writeCSV($preinfo,$id,$newUser) {
    $out = fopen('data/users.csv', 'w');
    foreach($preinfo as $clave => $array) {
        if($clave == $id) {
            fputcsv($out,$newUser);
        }else {
            fputcsv($out, $array);
        }
    }
    fclose($out);
}

// header("Location: user_index.php")
?>