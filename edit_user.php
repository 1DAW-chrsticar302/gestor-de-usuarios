<?php
include_once('./libraries/functions.php');
boot();

$servername = 'localhost';
$dbname = 'usuariosdb';
$dbuser = 'usuario';
$passwd = 'passwd';

try {
    $db = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $dbuser, $passwd);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("No se ha podido conectar a la base de datos: " . $e->getMessage());
}

// Obtener ID desde GET o desde POST oculto (por si el action pierde el id)
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
}

if (!$id) {
    header("Location: ./index_user.php");
    exit;
}

// Obtener datos actuales del usuario
try {
    $stmt = $db->prepare("SELECT * FROM usuarios WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error al obtener usuario: " . $e->getMessage());
}

if (!$usuario) {
    die("Usuario no encontrado (id=$id)");
}

$mensaje = '';

if (isset($_POST['actualizar'])) {

    // Mostrar debug básico de POST
    // NOTA: en producción quita estos var_dumps
    // var_dump($_POST);

    $userData = filter_input_array(INPUT_POST, [
        'nombre' => FILTER_DEFAULT,
        'email'  => FILTER_VALIDATE_EMAIL,
        'rol'    => FILTER_DEFAULT,
        'id'     => FILTER_VALIDATE_INT
    ]);

    // DEBUG: muestra lo que ha llegado
    // Puedes comentar estas líneas cuando funcione
    // echo "<pre>userData:\n"; var_dump($userData); echo "</pre>";

    if ($userData === null) {
        $mensaje = "No se han recibido datos del formulario.";
    } elseif ($userData['email'] === false || empty($userData['email'])) {
        $mensaje = "Email no válido: " . (isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '');
    } else {

        // Si no hay cambio entre datos antiguos y nuevos, avisamos
        $hayCambio = (
            $userData['nombre'] !== $usuario['nombre'] ||
            $userData['email']  !== $usuario['email'] ||
            $userData['rol']    !== $usuario['rol']
        );

        if (!$hayCambio) {
            $mensaje = "No hay cambios en los datos (UPDATE no necesario).";
        } else {
            try {
                $update = $db->prepare("
                    UPDATE usuarios
                    SET nombre = :nombre,
                        email  = :email,
                        rol    = :rol
                    WHERE id = :id
                ");

                $update->bindValue(':nombre', $userData['nombre']);
                $update->bindValue(':email',  $userData['email']);
                $update->bindValue(':rol',    $userData['rol']);
                $update->bindValue(':id',     $id, PDO::PARAM_INT);

                $update->execute();

                $affected = $update->rowCount(); // filas afectadas

                if ($affected > 0) {
                    $mensaje = "Usuario actualizado correctamente. Filas afectadas: $affected";
                    // refrescar $usuario con datos nuevos
                    $usuario = [
                        'nombre' => $userData['nombre'],
                        'email' => $userData['email'],
                        'rol' => $userData['rol'],
                        'id' => $id
                    ];
                    header("Location: index_user.php");
                    exit();
                } else {
                    // rowCount puede ser 0 si los datos son iguales o si el driver no devuelve rowCount
                    $mensaje = "UPDATE ejecutado, pero no se ha afectado ninguna fila. Comprueba que los valores cambiaron y que el usuario existe.";
                }
                

            } catch (PDOException $e) {
                $mensaje = "Error en la actualización: " . $e->getMessage();
            }
        }
    }
}

// Renderizar plantilla
include_once('./templates/edit_user.tpl.php');
?>
