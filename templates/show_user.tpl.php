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
    <?php if(isset($usuario)): ?>
    <h1><?php echo htmlspecialchars($usuario['nombre']); ?></h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
        <tr>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td><?php echo htmlspecialchars(ucfirst($usuario['rol'])); ?></td>
            </tr>  
        </table>
        <p><a href="./index_user.php">Listado usuarios</a></p>
    <?php else: ?>
        <p>No existe el usuario solicitado.</p>
    <?php endif; ?>  
</body>
</html>