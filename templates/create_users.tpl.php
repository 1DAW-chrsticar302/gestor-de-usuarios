<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Minified version -->
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Lista de usuarios</title>
</head>
<body>
    <h1>Nuevo usuario</h1>
    <?php if(isset($mensaje)&&!empty($mensaje)): ?>
        <p><?php echo $mensaje; ?></p>
    <?php endif; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="nombre">Nombre: </label><input id="nombre" type="text" placeholder="Nombre de usuario aquí" name="nombre">
        <label for="email">Email: </label><input id="email" type="email" placeholder="Email de usuario aquí" name="email">
        <input type="submit" value="Crear" name="crear">
        <label for="rol">Rol: </label>
        <select id="rol" name="rol">
            <option selected value="admin">Administrador</option>
            <option value="guest">Invitado</option>
            <option value="editor">Editor</option>
        </select> 
    </form>
    <p><a href="./index_user.php">Volver a listado usuarios</a></p>

</body>
</html>