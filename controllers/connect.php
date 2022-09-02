<?php
//Para nombrar variable se pone signo $
//obligatorio finalizar con ;

$nombreServidor='localhost';
$nombreUsuario='root'; 
$clave='' ;
$nombreBaseDatos='miProyecto';

//objeto de la conexion
$con=new mysqli($nombreServidor,$nombreUsuario,$clave,$nombreBaseDatos);

//crear la conexión
if ($con->connect_error) {
    die("Conexión fallida".$con->connect_error);
}
//echo:para imprimir
//echo "Conexión exitosa";
    
?>