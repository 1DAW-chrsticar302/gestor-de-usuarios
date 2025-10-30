<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="cuestionario">
        <form action="subir.php" method="post" enctype="multipart/form-data">
            <div>
            <label for="imagen">Selecciona tu imágen de perfil:</label>
            <input type="file" name="imagen" accept="image/*">
            </div>

            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name">
            </div>

            <div>
                <label for="email">Correo:</label>
                <input type="email" name="email">
            </div>

            <div>
                <label for="rol">Rol:</label>
                <input type="text" name="rol">
            </div>

            <input type="submit" value="Crear">

        </form>
    </div>
</body>
</html>