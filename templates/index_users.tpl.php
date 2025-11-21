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
    <h1>Usuarios en sistema</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
        </tr>
        <?php foreach($usuarios as  $usuario): ?>  
        <tr>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td><?php echo htmlspecialchars(ucfirst($usuario['rol'])); ?></td>
        </tr>
        <?php endforeach; ?>   
    </table>
    <p><a href="./create_user.php">NUEVO USUARIO</a></p>

</body>
</html>