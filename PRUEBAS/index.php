<?php

$servername = 'localhost';
$dbname = 'pruebasdb';
$usuario = 'usuario';
$password = 'passwd';

try{

    $db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$usuario,$password);
    $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}catch (PDOExeption $e){
    die('No se ha podido encontrar la base de datos: ' . $e->getMessage());
}

$stmt = $db -> prepare('SELECT * FROM usuarios');
$stmt -> execute();
$usuarios = $stmt -> fetchAll(PDO::FETCH_ASSOC);

// foreach ($usuarios as $key => $user) {
//     var_dump($key);
//     var_dump($usuario);
//     echo '<br>';
// }

// foreach ($usuarios as $usuario) {
//     echo 'id='.$usuario['id'].'  |  nombre='.$usuario['nombre'].'  |  rol='.$usuario['rol'].'  |  fecha='.$usuario['fecha'];
//     echo '<br>';
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>

    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">

    <style>
        
    </style>

</head>
<body>
    <center>
        <table border="2">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ROL</th>
                <th>FECHA</th>
            </tr>

            <?php foreach($usuarios as $usuario): ?>

            <tr>
                <td><?php echo $usuario['id'] ?></td>
                <td><?php echo $usuario['nombre'] ?></td>
                <td><?php echo $usuario['rol'] ?></td>
                <td><?php echo $usuario['fecha'] ?></td>
            </tr>

            <?php endforeach; ?>
        </table>

        <form action="./crear.php"><button type="submit">CREAR</button></form>
        <form action="./mod.php" method="get"><input type="number" name="id" placeholder=1><button type="submit">MODIFICAR</button></form>
        <form action="./del.php" method="get"><input type="number" name="id" placeholder=1><button type="submit">ELIMINAR</button></form>
    </center>
</body>
</html>