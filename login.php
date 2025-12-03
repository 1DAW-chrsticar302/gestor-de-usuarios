<?php 
session_start();
include_once('./libraries/functions.php');

//Inicialización
boot();
$servername = 'localhost';
$dbname = 'usuariosdb';
$usuario =  'usuario';
$passwd = 'passwd';

try{
    $db = new PDO('mysql:host='.$servername.';dbname='.$dbname,$usuario,$passwd);
    // echo "Conected";
}catch (PDOException $e){
    echo "No se ha podido conectar a la base de datos";
}
if(isset($_GET['campos'])) {
    $error = 'CAMPOS NO RELLENADOS';
}else{
    $error = '';
}


if(isset($_POST['signIn'])){
    if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['nombre']) && $_POST['password']!=null && $_POST['email']!=null && $_POST['nombre']!=null) {
        $_SESSION['user'] = array(
            'nombre' => $_POST['nombre'],
            'email' => $_POST['email'],
            'password' => $_POST['password']
        );

        header('Location: validate.php');
    }else{
        header('Location: login.php?campos=true');
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Glassmorphism Login Form</title>
    <link rel="stylesheet" href="style.css">

    <style>
        *{
            margin: 0;
            padding: 0;
        }
        .login-form {
            display: flex;
            flex-direction: column;
        }
        .submit {
            width: 40%;
            place-self: center;
            font-size: 30px;
            background-color: rgba(215, 192, 250, 1);
            border: 0;
            border-radius: 5px;
        }
        .submit:hover {
            background-color: rgba(136, 77, 224, 1);
            font-size: 15px;
            padding: 2.5%;
        }
        label{
            color: white;
        }
    </style>

</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2>Welcome Back</h2>
                <p>Sign in to your account</p>
            </div>
            
            <form class="login-form" id="loginForm" method="POST" action="./login.php" novalidate>
                <b><label for="nombre">Nombre:</label></b>
                <input type="text" name="nombre">
                <br>
                <b><label for="email">Email:</label></b>
                <input type="email" name="email">
                <br>
                <b><label for="password">Password:</label></b>
                <input type="password" name="password">
                <br>
                <input type="submit" name="signIn" class="submit" value="Sign In">
                <p style="text-align: center; margin-top: 7%;"><?php echo $error ?></p>
            </form>
        </div>
    </div>

    

    <script src="../../shared/js/form-utils.js"></script>
    <script src="script.js"></script>
</body>
</html>