<?php
// Declara las variables para la conexión
$db_server = 'sql629.main-hosting.eu';
$db_username = 'u142416532_usergym';
$db_password = 'KDAr2spV|7';
$db_database = 'u142416532_bdgym';
// Conexión a la base de datos
$db_connect = new mysqli($db_server, $db_username, $db_password, $db_database);
$db_connect -> query("SET NAMES 'utf8'");
// Error al no poder conectar a la base de datos
if ($db_connect -> connect_error){
die ('Conexión fallida: ' . $db_connect -> connect_error);
}
// Reseteo de las variables de conexión
$db_server = null;
$db_username = null;
$db_password = null;
$db_database = null;
?>