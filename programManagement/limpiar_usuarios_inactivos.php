<?php

$archivo_log = "../data/limpieza.log";   // ruta al log

// Leer el archivo CSV en un array
function leerArchivoCSV() {
  $tablero = [];
  $rutaArchivoCSV = "../data/users.csv";

   if(($puntero = fopen($rutaArchivoCSV, "r")) !== FALSE) {
      while (($datosFila = fgetcsv($puntero)) !== FALSE) {
          $tablero[] = $datosFila;
      }
      fclose($puntero);
  }
  return $tablero;
}
$users = leerArchivoCSV();

// Crear arrays para usuarios activos e inactivos
$usuarios_activos = [];
$usuarios_inactivos = [];

// Fecha actual
$hoy = new DateTime();

// Recorrer cada línea del CSV
foreach ($users as $user) {
    
    $nombre = $user[0];
    $email  = $user[1];
    $rol    = $user[2];
    $fecha_login = $user[3];
    
    // Convertir la fecha a objeto DateTime
    $fecha_ultimo_login = DateTime::createFromFormat('Y-m-d', $fecha_login);
    
    // Si la fecha no es válida, mantener el usuario
    if (!$fecha_ultimo_login) {
        $usuarios_activos[] = $user;
        continue;
    }
    
    // Calcular diferencia en días
    $diferencia = $hoy->diff($fecha_ultimo_login)->days;
    
    // Si han pasado más de 365 días => usuario inactivo
    if ($diferencia > 365) {
        $usuarios_inactivos[] = $user;
    } else {
        $usuarios_activos[] = $user;
    }
}

// Sobrescribir el archivo CSV solo con los usuarios activos
function writeCSV($usuarios_activos) {
    $out = fopen('../data/users.csv', 'w');
    foreach($usuarios_activos as $usuario) {
        fputcsv($out, $usuario);
    }
}

writeCSV($usuarios_activos);

// Registrar en el log
$fecha_ejecucion = date("Y-m-d H:i:s");
$mensaje = "$fecha_ejecucion - Usuarios eliminados: " . count($usuarios_inactivos) . PHP_EOL;
file_put_contents($archivo_log, $mensaje, FILE_APPEND);

// header("Location: ../user_index.php")
?>
