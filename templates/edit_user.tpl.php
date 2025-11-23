<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Editar usuario</title>
</head>
<body>
    <h1>Editar usuario</h1>

    <?php if(!empty($mensaje)): ?>
        <p><?php echo htmlspecialchars($mensaje); ?></p>
    <?php endif; ?>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . urlencode($id); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <label for="nombre">Nombre:</label>
        <input id="nombre" type="text" name="nombre" value="<?php echo htmlspecialchars($usuario['nombre'] ?? ''); ?>">

        <label for="email">Email:</label>
        <input id="email" type="email" name="email" value="<?php echo htmlspecialchars($usuario['email'] ?? ''); ?>">

        <label for="rol">Rol:</label>
        <select id="rol" name="rol">
            <option value="admin"  <?php echo (($usuario['rol'] ?? '')==='ADMIN') ? 'selected' : ''; ?>>Administrador</option>
            <option value="guest"  <?php echo (($usuario['rol'] ?? '')==='GUEST') ? 'selected' : ''; ?>>Invitado</option>
            <option value="editor" <?php echo (($usuario['rol'] ?? '')==='EDITOR') ? 'selected' : ''; ?>>Editor</option>
        </select>

        <input type="submit" name="actualizar" value="Actualizar">
    </form>

    <p><a href="./index_user.php">Volver a listado usuarios</a></p>
</body>
</html>
