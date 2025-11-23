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
            height: 400px;
            margin-top: 30%;
            place-self: center;
            text-align: center;
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
    
    <div class="content">

        <h1>Eliminar usuario</h1>

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) . '?id=' . urlencode($id); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

        <p>¿Deseas eliminar al usuario?</p>
        <input type="hidden" name="delete" value='delete'>
        <input type="submit" name="actualizar" value="ELIMINAR">
    </form>

    <p><a href="./index_user.php">Volver a listado usuarios</a></p>

    </div>

</body>
</html>