<?php

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
//Lógica de negocio
$mensaje = '';


if(isset($_POST['crear'])){
    //Creamos usuario
    $userData = filter_input_array(INPUT_POST,[
        'nombre' => FILTER_DEFAULT,
        'email' => FILTER_VALIDATE_EMAIL,
        'password' => FILTER_DEFAULT,
        'rol' => FILTER_DEFAULT

    ]);
    if(!empty($userData)){
        

        // $id = intval(getDataFromCSV('./data/last_id.csv')[0]['id']);
        // $id+=1;
        $hashed_passwd = password_hash($userData['password'],PASSWORD_DEFAULT);
        $userData['password'] = $hashed_passwd;

        $stmn = $db -> prepare("INSERT INTO users (nombre, email, rol, password) VALUES ('".$userData['nombre']."', '".$userData['email']."', '".$userData['rol']."', '".$userData['password']."');");
        $stmn -> execute();
        
        // putDataInCSV([$userData], './data/users.csv');

        //TODO: Crear funciones que permitan gestionar esto con una sola llamada
        

        $mensaje= 'Usuario creado';
        header("Location: index_user.php");
        exit();
        
    }
    
}
//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/create_users.tpl.php');
?>