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
    <?php var_dump($_SESSION) ?>
    <h1>Usuarios en sistema</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Rol</th>
            <!-- <th>VER</th>
            <th>EDITAR</th>
            <th>ELIMINAR</th> -->
        </tr>
        <?php foreach($usuarios as  $usuario): ?>  
        <tr>
            <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
            <td><?php echo htmlspecialchars($usuario['email']); ?></td>
            <td><?php echo htmlspecialchars(ucfirst($usuario['rol'])); ?></td>
            <td><?php echo '<form action="./show_user.php" method="get"><button>INFO</button><input type="hidden" name="id" value="'.htmlspecialchars($usuario['id']).'"></form>'; ?></td>
            <td><?php echo '<form action="./edit_user.php" method="get"><button>EDIT</button><input type="hidden" name="id" value="'.htmlspecialchars($usuario['id']).'"></form>'; ?></td>
            <td><?php echo '<form action="./delete_user.php" method="get"><button>DEL</button><input type="hidden" name="id" value="'.htmlspecialchars($usuario['id']).'"></form>'; ?></td>
        </tr>
        <?php endforeach; ?>   
    </table>
    <p><a href="./create_user.php">NUEVO USUARIO</a></p>
    <p><form action="./LOGOUT.php"><button type="submit">Log Out</button></form></p>

</body>
</html>