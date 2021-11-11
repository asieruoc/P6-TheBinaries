<?php

/*El objetivo de este archivo sera la configuracion de la conexion a la DB PHPMyAdmin */

$server = "localhost";
$usuario = "root";
$pass = "123456";
$db = "producto2p6";


$conexion = new mysqli($server, $usuario, $pass, $db); //1 

if($conexion ->connect_errno){ //2

die("Error de conexión. Revise las credenciales". $conexion ->connect_errno);

}else{

    echo "¡Conexión exitosa!";
}




?>