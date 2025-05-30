<?php
$host = "app-servidor21051484.mysql.database.azure.com";
$usuario = "rootits";
$contrasena = "Pi-21051484";
$base_datos = "calificaciones";
$puerto = 3306;

$conexion = new mysqli($host, $usuario, $contrasena, $base_datos, $puerto);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>
