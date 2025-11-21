<?php

echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Id</th><th>Nombre</th><th>Email</th><th>Rol</th><th>Fecha</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

$servername = "localhost";
$username = "usuario";
$password = "passwd";

try {
  $conn = new PDO("mysql:host=$servername;dbname=usuariosDB", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

$stmt = $conn->prepare("SELECT id, nombre, email, rol, fecha FROM usuarios");
$stmt->execute();

try{
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $clave=>$valor) {
        echo $valor;
}
}catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
}


function insertar($array,$conn) {

    $stmt=$conn->prepare("INSERT INTO  usuarios (id,nombre,email,rol) VALUES ('" . $array['id'] . "','" . $array['nombre'] . "','" . $array['email'] . "','" . $array['rol'] . "')");
    $stmt->execute();

}

?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ddbb</title>
</head>
<body>
  
    <?php 
    $userData = array(
        'id'=>69,
        'nombre'=> 'pacopepe',
        'email'=>'paco@pepe.bb',
        'rol'=> 'ADMIN'
    );
    $array = array(1,2,3,4,5);
    insertar($userData,$conn);
    ?>

</body>
</html>