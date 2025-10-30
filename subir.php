<?php
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

dump($_FILES);
dump($_POST);

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['rol'])) {
    
    if ($_POST['name']!=null && $_POST['email']!=null && $_POST['rol']!=null) {
        
        // Verifica si se ha enviado un archivo
        if (isset($_FILES['imagen']) && $_FILES['imagen']['error'] === UPLOAD_ERR_OK) {
            $archivoTmp = $_FILES['imagen']['tmp_name'];
            $nombreOriginal = basename($_FILES['imagen']['name']);
            $carpetaDestino = 'imagenes/';
        // Crear carpeta si no existe
            if (!is_dir($carpetaDestino)) {
                mkdir($carpetaDestino, 0755, true);
            }
        // Ruta final
            $rutaFinal = $carpetaDestino . $nombreOriginal;
        // Mover el archivo
            if (move_uploaded_file($archivoTmp, $rutaFinal)) {    
            // header("Location: user_index.php");
                exit();
            } else {
                echo "Error al mover la imagen.";
            }
        } else {
            echo "No se ha introducido imagen";
        }
    }else{
        echo "Datos no introducidos";
    }

}else{
    echo "Error al crear el usuario";
}

?>
