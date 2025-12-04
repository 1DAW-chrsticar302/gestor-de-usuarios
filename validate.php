<?php
    session_start();

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
    // LA CONTRASEÑA ES pacopepe
    $email = $_SESSION['user']['email'];
    $passwd = $_SESSION['user']['password'];
    
    $email = $db -> prepare('SELECT * FROM users WHERE email = "'.$email.'"');
    $email -> execute();

    foreach($email as $valor) {
        if($valor != null) {
            $hashed_passwd = $valor['password'];
        }
    } 

    if(password_verify($passwd, $hashed_passwd)) {
        $id = $valor['id'];
        $rol = $valor['rol'];
    }
    
    unset($_SESSION['user']);
    $_SESSION['id'] = $id;
    $_SESSION['rol'] = $rol;
    

    if(isset($_SESSION['id']) && isset($_SESSION['rol'])) {
        header('Location: index_user.php');
    }else {
        echo 'ERROR EN REDIRECCIÓN';
    }
?>