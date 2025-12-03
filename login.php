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

if(isset($_POST['signIn'])){
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $_SESSION['user'] = array(
            'nombre' => $_POST['email'],
            'passwd' => $_POST['password']
        );

        header('Location: index_user.php');
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
</head>
<body>
    <?php dump($_SESSION);?>
    <div class="login-container">
        <div class="login-card">
            <div class="login-header">
                <h2>Welcome Back</h2>
                <p>Sign in to your account</p>
            </div>
            
            <form class="login-form" id="loginForm" method="POST" action="./login.php" novalidate>
                
                <label for="email">Email</label>
                <input type="email" name="email">
                <br>
                <label for="password">Password</label>
                <input type="password" name="password">
                <br>
                <input type="submit" name="signIn" value="Sign In">
            </form>
        </div>
    </div>

    <script src="../../shared/js/form-utils.js"></script>
    <script src="script.js"></script>
</body>
</html>